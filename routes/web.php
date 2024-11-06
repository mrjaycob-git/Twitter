<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;

// Dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// Profile route
Route::get('/profile', [ProfileController::class, 'index']);

// Post routes
Route::get('/post/{postId}', [PostController::class, 'show'])->name('post.show');
Route::post('/posts', [PostController::class, 'store'])->name('post.store'); // Add posts via POST to `/posts`
Route::delete('/posts/{postId}', [PostController::class, 'destroy'])->name('post.destroy');
Route::put('/posts/{postId}', [PostController::class, 'update'])->name('post.update');

// Comment routes
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

// Search route
Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');

// Authentication routes
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store'])->name('register.store');
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');