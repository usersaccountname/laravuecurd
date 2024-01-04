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


// Instructor routes
Route::resource('teachers', InstructController::class);
Route::middleware(['auth:instructors'])->group(function () {
    Route::get('/i_dash', [InstructController::class, 'index'])->name('teachers.dashboard');
    Route::get('/main', [InstructController::class, 'index'])->name('teachers.home');
    Route::get('/i_scheds', [InstructController::class, 'schedules'])->name('teachers.schedules');
    Route::get('/salaries', [InstructController::class, 'salaries'])->name('teachers.salaries');
});

// Student routes
Route::resource('learners', StudController::class);
Route::middleware(['auth:students'])->group(function () {
    Route::get('/s_dash', [StudController::class, 'index'])->name('learners.dashboard');
    Route::get('/main', [StudController::class, 'index'])->name('learners.home');
    Route::get('/s_scheds', [StudController::class, 'schedules'])->name('learners.schedules');
    Route::get('/fees', [StudController::class, 'fees'])->name('learners.fees');
});

// Director routes
Route::resource('directors', DirectorController::class);
// Route::middleware(['auth:directors', 'prefix' => 'directors'])->group(function () {
Route::middleware(['auth:directors'])->group(function () {
    Route::get('/admindash', [DirectorController::class, 'index'])->name('director.dashboard');
    Route::get('/admin', [DirectorController::class, 'index'])->name('director.home');
    // Add more director-specific routes if needed
    Route::resource('courses', CourseController::class);
    Route::resource('instructors', InstructorController::class);
    Route::resource('sections', SectionController::class);
    Route::resource('students', StudentController::class);
    Route::resource('enrolls', EnrollController::class);
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


