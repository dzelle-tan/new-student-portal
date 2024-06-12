<?php

use App\Http\Controllers\ClassesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EnrollmentDownloadsController;
use App\Http\Controllers\GradesDownloadController;
use App\Http\Controllers\StudentViolationController;
use App\Http\Controllers\LOARequestController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\AddDropRequestController;
use App\Http\Controllers\ShiftingRequestController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerifyController;

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

Route::get('download/{file}', [DownloadController::class, 'download'])
    ->name('download');

Route::get('/grades/gradesPDF', [GradesDownloadController::class, 'downloadGrades'])
    ->middleware(['auth'])
    ->name('downloadGradesPDF');

Route::get('/', [HomeController::class, 'index'])
    ->middleware(['auth'])
    ->name('home');

/* Routes for Academic Directives */

// Route to handle the LOA file uploads submission
Route::post('/loa_request', [LOARequestController::class, 'pushRequest'])
    ->middleware(['auth'])
    ->name('loa_request.post');

// Route to show the view of LOA
Route::get('loa', [LOARequestController::class, 'showLoaRequestForm'])
    ->middleware(['auth'])
    ->name('loa');

// Route to handle the LOA file uploads submission
Route::post('/add_drop_request', [AddDropRequestController::class, 'pushRequest'])
->middleware(['auth'])
->name('add_drop_request.post');

// Route to show the view of Add Drop
Route::get('add_drop', [AddDropRequestController::class, 'showAddDropRequestForm'])
    ->middleware(['auth'])
    ->name('add_drop');

// Route to handle the Shifting file uploads submission
Route::post('/shifting_request', [ShiftingRequestController::class, 'pushRequest'])
    ->middleware(['auth'])
    ->name('shifting_request.post');

// Route to handle the view of Shifting request
Route::get('shifting', [ShiftingRequestController::class, 'showShiftingRequestForm'])
    ->middleware(['auth'])
    ->name('shifting');

// Route::view('home', 'layouts.home')
//     ->middleware(['auth'])
//     ->name('home');

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

Route::get('/home', [HomeController::class, 'index'])
    ->middleware(['auth'])
    ->name('home');

Route::get('/verify', [VerifyController::class, 'verify'])
    ->name('verify');

require __DIR__.'/auth.php';
