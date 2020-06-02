<?php

namespace App\Console\Commands;

use App\Emailmanager;
use App\ExpiryTracker;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;

class LicenceExpiryReminderEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expiry:licence';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is scheduler task to find licence about to expire within some specific days.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //////////////////////
        /// start of cron  ///
        //////////////////////

        error_reporting(0);


        if (Schema::hasTable('atpls') && Schema::hasTable('ppls') && Schema::hasTable('cpls') && Schema::hasTable('fools')) {

            $atplTemplate = Emailmanager::where('email_for','atpl')->first();
            $pplTemplate = Emailmanager::where('email_for','ppl')->first();
            $cplTemplate = Emailmanager::where('email_for','cpl')->first();
            $foolTemplate = Emailmanager::where('email_for','fool')->first();
            $generalTemplate = Emailmanager::where('email_for','general')->first();

            $days_intervals = explode(',',$atplTemplate->days_before_expire .','.$pplTemplate->days_before_expire .','.$cplTemplate->days_before_expire.','.$foolTemplate->days_before_expire);

            //
            //            explode(',',$atplTemplate->days_before_expire);
            //            $days_intervals[] = explode(',',$pplTemplate->days_before_expire);
            //            $days_intervals[] = explode(',',$cplTemplate->days_before_expire);
            //            $days_intervals[] = explode(',',$foolTemplate->days_before_expire);

            $days_intervals = array_unique($days_intervals);
            sort($days_intervals);
            //            dd($days_intervals);


            $expiryItems = [];
            $stepOn = 0;
            $totalItem = 0;
            foreach ($days_intervals as $interval){

                if(is_numeric($interval) && $interval >= 0){

                    $count = 0;
                    $items = [];
                    $dateFrom   = date("Y-m-d", strtotime("+". $stepOn . " days"));
                    $dateTo     = date("Y-m-d", strtotime("+". $interval . " days"));

                    $items[0] = DB::table('atpls')->whereBetween('validity_of_licence_to', [$dateFrom, $dateTo])->get();
                    $items[1] = DB::table('cpls')->whereBetween('validity_of_licence_to', [$dateFrom, $dateTo])->get();
                    $items[2] = DB::table('ppls')->whereBetween('validity_of_licence_to', [$dateFrom, $dateTo])->get();
                    $items[3] = DB::table('fools')->whereBetween('validity_of_licence_to', [$dateFrom, $dateTo])->get();
                    $count = count($items[0]) + count($items[1]) + count($items[2]) + count($items[3]);


                    // saving licence record who are about to expire within specific number of days
                    // atpl
                    foreach($items[0] as $item) {
                        $track = ExpiryTracker::where('section','atpls')
                            ->where('licence_no', $item->licence_no)
                            ->where('days_before_expire', $interval)
                            ->first();

                        if(!$track){
                            ExpiryTracker::create([
                                'section' => 'atpls',
                                'licence_no' => $item->licence_no,
                                'expires_on' => $item->validity_of_licence_to,
                                'days_before_expire' => $interval,
                                'status' => 0,
                            ]);
                        }
                    }

                    // cpl
                    foreach($items[1] as $item) {
                        $track = ExpiryTracker::where('section','cpls')
                            ->where('licence_no', $item->licence_no)
                            ->where('days_before_expire', $interval)
                            ->first();

                        if(!$track){
                            ExpiryTracker::create([
                                'section' => 'cpls',
                                'licence_no' => $item->licence_no,
                                'expires_on' => $item->validity_of_licence_to,
                                'days_before_expire' => $interval,
                                'status' => 0,
                            ]);
                        }
                    }

                    // ppl
                    foreach($items[2] as $item) {
                        $track = ExpiryTracker::where('section','ppls')
                            ->where('licence_no', $item->licence_no)
                            ->where('days_before_expire', $interval)
                            ->first();

                        if(!$track){
                            ExpiryTracker::create([
                                'section' => 'ppls',
                                'licence_no' => $item->licence_no,
                                'expires_on' => $item->validity_of_licence_to,
                                'days_before_expire' => $interval,
                                'status' => 0,
                            ]);
                        }
                    }

                    // fool
                    foreach($items[3] as $item) {
                        $track = ExpiryTracker::where('section','fools')
                            ->where('licence_no', $item->licence_no)
                            ->where('days_before_expire', $interval)
                            ->first();

                        if(!$track){
                            ExpiryTracker::create([
                                'section' => 'fools',
                                'licence_no' => $item->licence_no,
                                'expires_on' => $item->validity_of_licence_to,
                                'days_before_expire' => $interval,
                                'status' => 0,
                            ]);
                        }
                    }

                    $stepOn = (int) $interval + 1;
//

                }

            }



            ////////////////////////////////////
            /// start emailing from the list ///
            /// //////////////////////////// ///

            $expiryItems = ExpiryTracker::where('expires_on','>=', date("Y-m-d"))->orderBy('days_before_expire','asc')->get();

            foreach ($expiryItems as &$pilot) {
                $pilot->details = DB::table($pilot->section)->where('licence_no',$pilot->licence_no)->first();

                $to_name = $pilot->details->pilot_name;
                $to_email = $pilot->details->email;
                $licence_no = $pilot->details->licence_no;
                $expire_date = $pilot->details->validity_of_licence_to;

                try {

                    if ($pilot->section == 'atpls')
                        $eTemplate = $atplTemplate;
                    else if ($pilot->section == 'cpls')
                        $eTemplate = $cplTemplate;
                    else if ($pilot->section == 'ppls')
                        $eTemplate = $pplTemplate;
                    else if ($pilot->section == 'fools')
                        $eTemplate = $foolTemplate;
                    else
                        $eTemplate = $generalTemplate;


                    $subject = $eTemplate->subject;
                    $body = $eTemplate->email_body;

                    $body = str_replace('<[pilot_name]>', $to_name,$body);
                    $body = str_replace('<[licence_no]>', $licence_no,$body);
                    $body = str_replace('<[expire_date]>', $expire_date,$body);


                    $data = array("body" => $body);

                    Mail::send('emailmanager.template', $data, function($message) use ($to_name, $to_email,$subject) {
                        $message->to($to_email, $to_name)
                            ->subject($subject);
                        $message->from('admin@caab.gov.bd','CAAB');
                    });

                }
                catch (\Exception $e) {
                    //return $e->getMessage();
                    continue;
                }

            }


        }

        $this->info('Licence expiry reminder has sent to All Pilots');
    }
}
