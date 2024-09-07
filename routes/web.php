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