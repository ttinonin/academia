<?php

use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('homepage');
});

// User related routes
Route::get('/login', [UserController::class, "showLoginForm"]);
Route::post('/login', [UserController::class, "login"]);
Route::get('/register', [UserController::class, "showRegisterForm"]);
Route::post('/register', [UserController::class, "create"]);
Route::post('/logout', [UserController::class, "logout"]);

Route::get('/create-exercise', [ExerciseController::class, "showCreateForm"]);