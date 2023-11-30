<?php

use App\Http\Controllers\ClassesController;
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

Route::view('home', 'layouts.home')
    ->middleware(['auth', 'verified'])
    ->name('home');

Route::view('profile', 'layouts.information.profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('classes', [ClassesController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('classes');

Route::view('grades', 'grades')
->middleware(['auth'])
->name('grades');

Route::get('student_violations', [StudentViolationController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('student_violations');

require __DIR__.'/auth.php';
