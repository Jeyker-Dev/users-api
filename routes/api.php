<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;

Route::get('/users', [UserController::class, 'index']);

Route::post('/user/create', [UserController::class, 'store']);
