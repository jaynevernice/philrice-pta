<?php

use App\Http\Controllers\DispatchFormController;
use App\Http\Controllers\KSLAnalyticsController;
use App\Http\Controllers\KSLFormController;
use App\Http\Controllers\TrainingsFormController;
use App\Http\Controllers\AuthController;
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

// php artisan make:controller AuthController

Route::get('/', function () {
    return view('landing');
})->name('landing');

// Route::get('/login', function () {
//     return view('login');
// })->name('login');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'AuthLogin'])->name('auth_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'super_admin'], function () {
    Route::group(['prefix' => 'super_admin'],function(){
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('super_admin.dashboard');
        
    });
});

Route::group(['middleware' => 'admin'], function () {
    Route::group(['prefix' => 'admin'],function(){
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('admin.dashboard');
        
    });
});

Route::group(['middleware' => 'encoder'], function () {
    Route::group(['prefix' => 'encoder'],function(){
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('encoder.dashboard');
        
    });
});

Route::group(['middleware' => 'rcef_user'], function () {
    Route::group(['prefix' => 'rcef_user'],function(){
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('rcef_user.dashboard');
        
    });
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');



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