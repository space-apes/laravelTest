<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //EXPLICIT SERVICE REGISTER
        app()->bind('App\Example', function(){
            $collaborator = new \App\Collaborator();
            $tempKey = config('services.importantSettings.key');
            return new \App\Example($tempKey, $collaborator);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
