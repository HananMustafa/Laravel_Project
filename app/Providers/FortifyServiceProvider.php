<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Illuminate\Http\Request; //For Password Reset

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




        // Customize login redirection
        // Fortify::authenticateUsing(function ($request) {
        //     return redirect('/home'); // Redirect to home after login
        // });
        
        // Customize logout redirection
        // Fortify::logout(function ($request) {
        //     return redirect('/'); // Redirect to welcome page after logout
        // });
        


        // Forgot Password View
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password');
        });

        // Reset Password View
        Fortify::resetPasswordView(function (Request $request) {
            return view('auth.reset-password', ['request' => $request]);
        });
        }
}
