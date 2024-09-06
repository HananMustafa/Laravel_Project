<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Register the view for registration
        Fortify::registerView(function () {
            return view('auth.register');
        });
        // Use the CreateNewUser action class to handle registration
        Fortify::createUsersUsing(\App\Actions\Fortify\CreateNewUser::class);




        // Register the view for login
        Fortify::loginView(function () {
            return view('auth.login');
        });
        
    }
}
