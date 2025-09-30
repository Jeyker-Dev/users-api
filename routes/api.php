<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;

Route::get('/users', [UserController::class, 'index']);

Route::get('user/{id}', [UserController::class, 'show']);

Route::post('/user/create', [UserController::class, 'store']);

Route::put('/user/update/{id}', [UserController::class, 'update']);
