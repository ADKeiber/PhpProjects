<?php

use App\Http\Controllers\UserController;

Route::get("/hello", [UserController::class,"helloWorld"]);
Route::post('/login', [UserController::class, 'login']);
Route::post('/createUser', [UserController::class, 'create']);