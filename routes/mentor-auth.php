<?php

use App\Http\Controllers\Mentor\Auth\LoginController;
use App\Http\Controllers\Mentor\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;


Route::prefix('mentor')->middleware('guest:mentor')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('mentor.register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])
        ->name('mentor.login');

    Route::post('login', [LoginController::class, 'store']);
});

Route::prefix('mentor')->middleware('auth:mentor')->group(function () {

    Route::get('/dashboard', function () {
        return view('mentor.dashboard');
    })->name('mentor.dashboard');

    Route::post('logout', [LoginController::class, 'destroy'])->name('mentor.logout');

});
