<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(Auth::check()){
            view()->composer('layout',function($view){
                $userr = Users::all();
                $view->with('');
            });
        }
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
