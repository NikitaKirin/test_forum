<?php

use App\Http\Controllers\Post\CommentController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->name('posts.comments.')->prefix('comments')->group(function () {
    Route::post('/{post}', [CommentController::class, 'store'])->name('store');
    Route::get('/{comment}/edit', [CommentController::class, 'edit'])->name('edit');
    Route::patch('/{comment}', [CommentController::class, 'update'])->name('update');
    Route::get('/{comment}', [CommentController::class, 'destroy'])->name('destroy');
});
