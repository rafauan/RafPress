<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
// use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

// Route::apiResource('posts', PostController::class);

Route::get('posts', [PostController::class, 'index']);
Route::get('posts/{post}', [PostController::class, 'show']);
Route::get('posts/{post}/comments', [PostController::class, 'comments']);

Route::get('categories', [CategoryController::class, 'index']);
Route::get('tags', [TagController::class, 'index']);

// Register user routes
Route::post('register', [AuthController::class, 'register']);
// Route::post('login', [AuthController::class, 'login']);

Route::get('/send-test-mail', [PostController::class, 'sendTestMail']);

// // Authentication required routes
// Route::middleware('auth')->group(function () {
//     Route::post('/send-verification-mail', [AuthController::class, 'sendVerificationMail'])
//         ->name('verification.send');
//     Route::post('/logout', [AuthController::class, 'logout']);
// });
