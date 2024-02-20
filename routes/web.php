<?php

use App\Http\Controllers\DispatchFormController;
use App\Http\Controllers\KSLAnalyticsController;
use App\Http\Controllers\KSLFormController;
use App\Http\Controllers\TrainingsFormController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



// Form 1
// Route::get('/kslform', function () {
//     return view('kslform');
// });

// KSL Routes but not grouped
// Route::get('/kslform', [KSLFormController::class, 'index'])->name('kslform.index');
// Route::get('/kslanalytics', [KSLAnalyticsController::class, 'index'])->name('kslanalytics.index');

Route::group(['prefix' => 'ksl'], function () {
    Route::get('/form', [KSLFormController::class, 'index'])->name('kslform.index');
    Route::get('/analytics', [KSLAnalyticsController::class, 'index'])->name('kslanalytics.index');
});


// Form 2
Route::group(['prefix' => 'trainings'], function() {
    Route::get('/form', [TrainingsFormController::class, 'index'])->name('trainingsform.index');
});

// Form 3
Route::group(['prefix' => 'dispatch'], function() {
    Route::get('/form', [DispatchFormController::class, 'index'])->name('dispatchform.index');
});