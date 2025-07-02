<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::apiResource('posts', PostController::class);

Route::get('/send-test-mail', [PostController::class, 'sendTestMail']);
