<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Illuminate\Http\Request; //For Password Reset

use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;

class FortifyServiceProvider extends ServiceProvider
{
    public function boot()
    {

        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        
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




        // Forgot Password View
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password');
        });

        // Reset Password View
         Fortify::resetPasswordView(function ($request) {
        return view('auth.reset-password', ['request' => $request]);
        });

        
        }
}
