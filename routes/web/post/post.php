<?php

use App\Http\Controllers\Post\PostController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->name('posts.')->prefix('posts')->group(function () {
    Route::get('/{post}/delete', [PostController::class, 'destroy'])->name('destroy');
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/create', [PostController::class, 'create'])->name('create');
    Route::post('/', [PostController::class, 'store'])->name('store');
    Route::get('/{post}', [PostController::class, 'show'])->name('show');
    Route::get('/{post}/edit', [PostController::class, 'edit'])->name('edit');
    Route::patch('/{post}', [PostController::class, 'update'])->name('update');
});
