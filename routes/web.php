<?php

use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkoutController;
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
Route::get('/profile/{user:id}', [UserController::class, "read"]);
Route::put('/profile/{user:id}', [UserController::class, "edit"])->middleware('can:update,user');
Route::get('/edit-profile', [UserController::class, "editForm"]);

// Exercises related routes
Route::get('/create-exercise', [ExerciseController::class, "showCreateForm"])->middleware('mustBeLoggedIn');
Route::post('/exercise', [ExerciseController::class, "create"])->middleware('mustBeLoggedIn');
Route::get('/exercises', [ExerciseController::class, "read"])->middleware('mustBeLoggedIn');
Route::get('/exercise/{exercise:id}', [ExerciseController::class, "readSingle"])->middleware('mustBeLoggedIn');
Route::delete('/exercise/{exercise:id}', [ExerciseController::class, "delete"])->middleware('mustBeLoggedIn');

// Workout related routes
Route::get('/create-workout', [WorkoutController::class, "showForm"]);
Route::post('/workout', [WorkoutController::class, "create"]);
Route::get('/workouts', [WorkoutController::class, "read"]);
Route::get('/workout/{workout:id}', [WorkoutController::class, "readSingle"]);
Route::get('/log-workout/{workout:id}', [WorkoutController::class, "showLogForm"]);
Route::post('/log-workout/{workout:id}', [WorkoutController::class, "log"]);
Route::get('/logs', [WorkoutController::class, "getLogs"]);