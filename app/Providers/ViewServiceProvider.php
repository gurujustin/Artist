<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // $users = User::orderBy('created_at', 'desc')->take(10)->get(); // Get the last 10 registered users
        // view()->share('lastUsers', $users); // Pass the $users variable to all views
    }
}
