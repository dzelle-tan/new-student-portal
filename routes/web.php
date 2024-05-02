<?php

use App\Http\Controllers\ClassesController;
use App\Http\Controllers\EnrollmentDownloadsController;
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

// Routes for Downloading Documents involving Enrollment
Route::get('/enrollment/schedule', [EnrollmentDownloadsController::class, 'downloadSchedule'])
    ->middleware(['auth'])
    ->name('enrollmentSchedule');

Route::get('/enrollment/fees', [EnrollmentDownloadsController::class, 'downloadFee'])
    ->middleware(['auth'])
    ->name('enrollmentFee');

Route::get('/enrollment/SER', [EnrollmentDownloadsController::class, 'downloadSER'])
    ->middleware(['auth'])
    ->name('enrollmentSER');

Route::view('/', 'welcome');

Route::view('home', 'layouts.home')
    ->middleware(['auth'])
    ->name('home');

Route::view('profile', 'layouts.information.profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('classes', [ClassesController::class, 'index'])
    ->middleware(['auth'])
    ->name('classes');

Route::view('grades', 'layouts.information.grades')
    ->middleware(['auth'])
    ->name('grades');

Route::view('registrar', 'layouts.services.registrar')
    ->middleware(['auth'])
    ->name('registrar');

Route::get('student_violations', [StudentViolationController::class, 'index'])
    ->middleware(['auth'])
    ->name('student_violations');

Route::view('enrollment', 'layouts.services.enrollment')
    ->middleware(['auth'])
    ->name('enrollment');

Route::view('registrar', 'layouts.services.registrar')
    ->middleware(['auth'])
    ->name('registrar');

Route::view('evaluation', 'layouts.services.evaluation')
    ->middleware(['auth'])
    ->name('evaluation');

require __DIR__.'/auth.php';
