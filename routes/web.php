<?php

namespace App\Http\Controller;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/', [PostController::class, 'store'] )->name('post.store');

Route::delete('/{postId}', [PostController::class, 'destroy'] )->name('post.destroy');

Route::put('/{postId}', [PostController::class, 'update'])->name('post.update');

Route::get('/profile', [ProfileController::class, 'index']);

Route::get('/post/{postId}', [PostController::class, 'show'])->name('post.show');

Route::post('/posts/{post}/comments', [PostController::class, 'store'])->name('comments.store');

Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');

Route::get('/register', [AuthController::class, 'register'])->name('auth.register');

Route::post('/register', [AuthController::class, 'store'])->name('auth.store');