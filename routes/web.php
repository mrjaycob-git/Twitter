<?php

namespace App\Http\Controller;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', [DashboardController::class, 'index'] )->name('dashboard');

Route::post('/', [PostController::class, 'store'] )->name('post.store');

Route::delete('/{postId}', [PostController::class, 'destroy'] )->name('post.destroy');

Route::put('/{postId}', [PostController::class, 'update'])->name('post.update');

Route::get('/profile', [ProfileController::class, 'index']);

Route::get('/post/{postId}', [PostController::class, 'show'])->name('post.show');

Route::post('/posts/{post}/comments', [PostController::class, 'store'])->name('comments.store');

Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

