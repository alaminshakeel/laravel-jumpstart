<?php

namespace App\Http\Controllers;

use App\Atoinstructor;
use App\Atpl;
use App\Cpl;
use App\ExpiryTracker;
use App\Fool;
use App\Institute;
use App\Ppl;
use App\Simulatorinstructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index()
    {

        return view('admin.dashboard.index');
    }

    function twoFactorForm(Request $request)
    {
//        dd('yo');

        $user = Auth::user();
//        dd($user->email);
        $to_name = $user->name;
        $trim = trim($user->email);
        $filter_var = filter_var($trim, FILTER_SANITIZE_EMAIL);
        $to_email = iconv('ISO-8859-1','UTF-8//IGNORE', $filter_var);

        $subject = env('APP_NAME'). ' Two Factor Authentication Verification';

        $code = rand(100000,999999);
        $user->code_2fa = $code;
        $user->twofactory_expiry = null;
        $user->save();

        $data = array("name" => $to_name,"code" => $code);


        Mail::send('auth.email.twofactor-template', $data, function($message) use ($to_name, $to_email,$subject) {
            $message->to($to_email, $to_name)
                ->subject($subject);
            $message->from(config('variables.FROM_EMAIL_ADDRESS'),'CAAB');
        });


        return view('auth.two-factor');
    }

    function verifyTwoFactorAuth(Request $request)
    {
        $this->validate($request, [
            'code_2fa' => 'required|max:255',
        ]);

        if($request->code_2fa == Auth::user()->code_2fa){
            $user = Auth::user();
            $user->twofactory_expiry = strtotime("+". config('session.lifetime') ." minutes", time());
            $user->save();

//            LoginActivity::create([
//                'user_id' => $user->id,
//                'email' => $user->email,
//                'ip_address' => $_SERVER['REMOTE_ADDR']
//            ]);


            return redirect('/admin');
        } else {
            return redirect('/step-two-factor-auth')->with('message', 'Incorrect code.');
        }

//        return view('auth.two-factor');
    }
}
