<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->name('user.')->group(function () {
    Route::get('/home', [UserController::class, 'index'])->name('home');
    Route::get('/logout', LogoutController::class)->name('logout');
    Route::patch('/me', [UserController::class, 'update'])->name('update');
});
