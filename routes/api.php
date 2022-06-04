<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

Route::group(['prefix' => 'auth'], function(){
    Route::post('/login', [LoginController::class, 'login'])->middleware('Login');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth:api');
});

Route::group([
        'middleware' =>'auth:api',
        'prefix' =>'post',
    ],function(){
        Route::get('/', [PostController::class, 'index']);
        Route::post('/', [PostController::class, 'store'])->middleware('AdminUser');
        Route::get('/{id}', [PostController::class, 'show']);
        Route::put('/{id}', [PostController::class, 'update']);
        Route::delete('/{id}', [PostController::class, 'destroy']);
        Route::put('/publish/{id}', [PostController::class, 'is_published']);
});

Route::group([
        'middleware' =>'auth:api',
        'prefix' =>'comment',
    ],function(){
        Route::get('/', [CommentController::class, 'index']);
        Route::post('/', [CommentController::class, 'store'])->middleware('AdminUser');
        Route::get('/{id}', [CommentController::class, 'show']);
        Route::put('/{id}', [CommentController::class, 'update']);
        Route::delete('/{id}', [CommentController::class, 'destroy']);
});

Route::group([
        'middleware' => ['auth:api', 'Admin'],
        'prefix' =>'user',
    ],function(){
        Route::get('/', [UserController::class, 'index']);
        Route::get('/{id}', [UserController::class, 'show']);
        Route::put('/approve/{id}', [UserController::class, 'is_approve']);
});