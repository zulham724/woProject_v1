<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Notification;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['layouts.admin-horizontal','layouts.operator-horizontal','layouts.staff-horizontal'],function($view){
            $data['allNotif'] = Notification::get();
            $data['countNotif'] = Notification::where('isRead',0)->count();
            $data['notification'] = Notification::where('isRead',0)->get();
            $view->with($data);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
