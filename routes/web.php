<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;


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

// Default route to render the main app layout
Route::get('/', function () {
    return view('layout'); // Ensure the view path uses a forward slash
});


Route::resource('/students', StudentController::class);
Route::resource('/teachers', TeacherController::class);