<?php

namespace App\Providers;

use App\Emailmanager;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Atpl;
use App\Ppl;
use App\Cpl;
use App\Fool;
use App\ExpiryTracker;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!defined('ADMIN')) {
           define('ADMIN', config('variables.APP_ADMIN', 'admin'));
        }
        require_once base_path('resources/macros/form.php');
        Schema::defaultStringLength(191);


        // prefetched expire pilots
        error_reporting(0);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
