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

// Super Admin
Route::group(['middleware' => 'super_admin'], function () {
    Route::group(['prefix' => 'super_admin'],function(){
        
        Route::get('/overview', function () {
            return view('super_admin.overview');
        })->name('super_admin.overview');

        Route::get('/ces', function() {
            return view('super_admin.ces');
        })->name('super_admin.ces');

        Route::get('/batac', function() {
            return view('super_admin.batac');
        })->name('super_admin.batac');

        Route::get('/agusan', function() {
            return view('super_admin.agusan');
        })->name('super_admin.agusan');

        Route::get('/bicol', function() {
            return view('super_admin.bicol');
        })->name('super_admin.bicol');

        Route::get('/isabela', function() {
            return view('super_admin.isabela');
        })->name('super_admin.isabela');

        Route::get('/losbaños', function() {
            return view('super_admin.losbaños');
        })->name('super_admin.losbaños');

        Route::get('/midsayap', function() {
            return view('super_admin.midsayap');
        })->name('super_admin.midsayap');

        Route::get('/negros', function() {
            return view('super_admin.negros');
        })->name('super_admin.negros');

        Route::get('/manage_rcef', function(){
            return view('super_admin.manage_rcef');
        })->name('super_admin.manage_rcef');

        Route::get('/manage_admins', function(){
            return view('super_admin.manage_admins');
        })->name('super_admin.manage_admins');
        
    });
});

// Admin
Route::group(['middleware' => 'admin'], function () {
    Route::group(['prefix' => 'admin'],function(){
        Route::get('/overview', function () {
            return view('admin.overview');
        })->name('admin.overview');

        Route::get('/ces', function() {
            return view('admin.ces');
        })->name('admin.ces');

        Route::get('/batac', function() {
            return view('admin.batac');
        })->name('admin.batac');

        Route::get('/agusan', function() {
            return view('admin.agusan');
        })->name('admin.agusan');

        Route::get('/bicol', function() {
            return view('admin.bicol');
        })->name('admin.bicol');

        Route::get('/isabela', function() {
            return view('admin.isabela');
        })->name('admin.isabela');

        Route::get('/losbaños', function() {
            return view('admin.losbaños');
        })->name('admin.losbaños');

        Route::get('/midsayap', function() {
            return view('admin.midsayap');
        })->name('admin.midsayap');

        Route::get('/negros', function() {
            return view('admin.negros');
        })->name('admin.negros');

        Route::get('/manage_encoders', function(){
            return view('admin.manage_encoders');
        })->name('admin.manage_encoders');
        
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