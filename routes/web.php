<?php

use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentViolationController;
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

Route::view('/', 'welcome');

Route::view('home', 'home')
    ->middleware(['auth', 'verified'])
    ->name('home');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('classes', [SubjectController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('classes'); 

Route::get('student_violations', [StudentViolationController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('student_violations'); 

require __DIR__.'/auth.php';