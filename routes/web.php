<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CourseController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\StudController;
use App\Http\Controllers\InstructController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DirectorController;
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
// Auth::routes();



Route::resource('learners', StudController::class);

Route::resource('directors', DirectorController::class);



Route::middleware(['auth:instructors'])->group(function () {
    // Student routes
    Route::get('/instrct_dashboard', [InstructController::class, 'index'])->name('dashboard');

    Route::get('/instrct_main', [InstructController::class, 'index'])->name('home');
});


Route::middleware(['auth:students'])->group(function () {
    // Student routes
    Route::get('/studnt_dashboard', [StudController::class, 'index'])->name('dashboard');


    Route::get('/studnt_main', [StudController::class, 'index'])->name('home');

    Route::get('/schedules', [StudController::class, 'schedules'])->name('schedules');
    Route::get('/fees', [StudController::class, 'fees'])->name('fees');
});



Route::middleware(['auth:directors'])->group(function () {
    // Student routes
    Route::get('/dirctr_dashboard', [DirectorController::class, 'index'])->name('dashboard');


    Route::get('/admin', [DirectorController::class, 'index'])->name('home');

    // Route::get('/dirctr_main', [DirectorController::class, 'index'])->name('home');

    // Course routes
    Route::resource('courses', CourseController::class);
    // Instructor routes
    Route::resource('instructors', InstructorController::class);
    // Section routes
    Route::resource('sections', SectionController::class);
    // Student routes
    Route::resource('students', StudentController::class);
    // Enroll routes
    Route::resource('enrolls', EnrollController::class);
    // Route::get('enrolls/{id}/fetchEnrolledSubjects', [EnrollController::class, 'fetchEnrolledSubjects'])->name('enrolls.fetchEnrolledSubjects');
    Route::resource('directors', DirectorController::class);


});



// // Add the following login routes
Route::get('/slogin', [StudController::class, 'showLoginForm'])->name('slogin');
Route::post('/slogin', [StudController::class, 'slogin']);
Route::match(['get', 'post'], '/slogout', [StudController::class, 'slogout'])->name('slogout');



// // Add the following login routes
Route::get('/ilogin', [InstructController::class, 'showLoginForm'])->name('ilogin');
Route::post('/ilogin', [InstructController::class, 'ilogin']);
Route::match(['get', 'post'], '/ilogout', [InstructController::class, 'ilogout'])->name('ilogout');


Route::get('/dlogin', [DirectorController::class, 'showLoginForm'])->name('dlogin');
Route::post('/dlogin', [DirectorController::class, 'dlogin']);
Route::match(['get', 'post'], '/dlogout', [DirectorController::class, 'dlogout'])->name('dlogout');


Route::get('/', function () {
    return view('landding');
});


