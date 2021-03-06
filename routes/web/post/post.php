<?php

use App\Http\Controllers\Post\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::middleware('auth')->name('posts.')->prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/me', [PostController::class, 'authIndex'])->name('auth-user');
    Route::get('/{post}/delete', [PostController::class, 'destroy'])->middleware('can:delete,post')->name('destroy');
    Route::get('/create', [PostController::class, 'create'])->name('create');
    Route::post('/', [PostController::class, 'store'])->name('store');
    Route::get('/{post}', [PostController::class, 'show'])->name('show');
    Route::get('/{post}/edit', [PostController::class, 'edit'])->middleware('can:update,post')->name('edit');
    Route::patch('/{post}', [PostController::class, 'update'])->middleware('can:update,post')->name('update');
});
