<?php

use App\Http\Controllers\Frontend\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [IndexController::class, 'Index']);
Route::get('/registration', [UserController::class, 'Registration']);
Route::post('/registration', [UserController::class, 'RegistrationPost']);

Route::get('/login', [UserController::class, 'Login']);
Route::post('/login', [UserController::class, 'LoginPost']);

Route::get('/logout', [UserController::class, 'Logout']);

Route::get('/student-list', [UserController::class, 'StudentList']);
Route::post('/student-add', [UserController::class, 'StudentAdd']);
Route::get('/student-view/{id}', [UserController::class, 'StudentView']);
Route::get('/student-edit/{id}', [UserController::class, 'StudentEdit']);
Route::post('/student-edit/{id}', [UserController::class, 'StudentEditPost']);
Route::get('/student-delete/{id}', [UserController::class, 'StudentDelete']);
