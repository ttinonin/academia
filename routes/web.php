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

Route::get('/', [UserController::class, "showCorrectHomepage"]);

// User related routes
Route::get('/login', [UserController::class, "showLoginForm"]);
Route::post('/login', [UserController::class, "login"]);
Route::get('/register', [UserController::class, "showRegisterForm"]);
Route::post('/register', [UserController::class, "create"]);
Route::post('/logout', [UserController::class, "logout"])->middleware('mustBeLoggedIn');

// Exercises related routes
Route::get('/create-exercise', [ExerciseController::class, "showCreateForm"])->middleware('mustBeLoggedIn');
Route::post('/exercise', [ExerciseController::class, "create"])->middleware('mustBeLoggedIn');
Route::get('/exercises', [ExerciseController::class, "read"])->middleware('mustBeLoggedIn');
Route::get('/exercise/{exercise:id}', [ExerciseController::class, "readSingle"])->middleware('mustBeLoggedIn');
Route::delete('/exercise/{exercise:id}', [ExerciseController::class, "delete"])->middleware('mustBeLoggedIn');