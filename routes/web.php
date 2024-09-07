<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Fortify routes for registration
if (Features::enabled(Features::registration())) {
    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    // This is the route that handles the form POST submission
    Route::post('/register', [\Laravel\Fortify\Http\Controllers\RegisteredUserController::class, 'store'])->name('register');

}




Route::get('/login', function () {
    return view('auth.login');
})->name('login');
// Fortify login route
Route::post('/login', [\Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::class, 'store'])->name('login');


// Logout route
Route::post('/logout', [\Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::class, 'destroy'])->name('logout');



// Home Route (Requires user to be authenticated)
Route::middleware(['auth'])->get('/home', function () {
    return view('home'); // this is your new home view
})->name('home');










// Password Reset Routes

// Forgot Password view
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

// Send Password Reset Link
Route::post('/forgot-password', [\Laravel\Fortify\Http\Controllers\PasswordResetLinkController::class, 'store'])->middleware('guest')->name('password.email');

// Password Reset View
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

// Reset the Password
Route::post('/reset-password', [\Laravel\Fortify\Http\Controllers\NewPasswordController::class, 'store'])->middleware('guest')->name('password.update');