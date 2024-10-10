<?php

namespace App\Http\Controller;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;

Route::get('/', [DashboardController::class, 'index'] )->name('dashboard');

Route::post('/', [PostController::class, 'store'] )->name('post.store');

Route::delete('/{postId}', [PostController::class, 'destroy'] )->name('post.destroy');

Route::put('/{postId}', [PostController::class, 'update'])->name('post.update');

Route::get('/profile', [ProfileController::class, 'index']);

Route::get('/post/{postId}', [PostController::class, 'show'])->name('post.show');
