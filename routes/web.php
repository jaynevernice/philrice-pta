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

Route::get('/forgot',function() {
    return view('forgot');
})->name('forgot');

Route::get('/reset', function() {
    return view('reset');
})->name('reset');

// Route::get('/login', function () {
//     return view('login');
// })->name('login');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'AuthLogin'])->name('auth_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'super_admin'], function () {
    Route::group(['prefix' => 'super_admin'],function(){
        Route::get('/dashboard', function () {
            return view('super_admin.dashboard');
        })->name('super_admin.dashboard');
        
    });
});

Route::group(['middleware' => 'admin'], function () {
    Route::group(['prefix' => 'admin'],function(){
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        
    });
});

// Encoder
Route::group(['middleware' => 'encoder'], function () {
    Route::group(['prefix' => 'encoder'],function(){

        Route::get('/overview', function () {
            return view('encoder.overview');
        })->name('encoder.overview');

        Route::get('/ces', function () {
            return view('encoder.ces');
        })->name('encoder.ces');

        Route::get('/ces_add', function () {
            return view('encoder.ces_add');
        })->name('encoder.ces_add');

        Route::get('/ces_edit', function () {
            return view('encoder.ces_edit');
        })->name('encoder.ces_edit');
        
    });
});

// RCEF User
Route::group(['middleware' => 'rcef_user'], function () {
    Route::group(['prefix' => 'rcef_user'],function(){
        
        Route::get('/overview', function() {
            return view('rcef_user.overview');
        })->name('rcef_user.overview');
        
        Route::get('/ces', function() {
            return view('rcef_user.ces');
        })->name('rcef_user.ces');

        Route::get('/batac', function() {
            return view('rcef_user.batac');
        })->name('rcef_user.batac');

        Route::get('/agusan', function() {
            return view('rcef_user.agusan');
        })->name('rcef_user.agusan');

        Route::get('/bicol', function() {
            return view('rcef_user.bicol');
        })->name('rcef_user.bicol');

        Route::get('/isabela', function() {
            return view('rcef_user.isabela');
        })->name('rcef_user.isabela');

        Route::get('/losbaños', function() {
            return view('rcef_user.losbaños');
        })->name('rcef_user.losbaños');

        Route::get('/midsayap', function() {
            return view('rcef_user.midsayap');
        })->name('rcef_user.midsayap');

        Route::get('/negros', function() {
            return view('rcef_user.negros');
        })->name('rcef_user.negros');
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