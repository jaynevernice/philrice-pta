<?php

use App\Http\Controllers\VisitorEvaluationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KSLFormController;
use App\Http\Controllers\DispatchFormController;
use App\Http\Controllers\KSLAnalyticsController;
use App\Http\Controllers\TrainingsFormController;
use App\Http\Controllers\WebAnalyticsController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\ProvinceController;

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

Route::get('/', function () {
    return view('landing');
})->name('landing');

// php artisan make:mail ForgotPasswordMail
// kapag inedit yung MAIL_USERNAME sa .env run this: php artisan config:cache
Route::get('/forgot_password', function () {
    return view('forgot_password');
})->name('forgot');
Route::post('/forgot', [AuthController::class, 'PostForgot'])->name('post-forgot');

Route::get('/reset_using_email', function () {
    return view('reset_email');
})->name('reset_email');
Route::post('/reset_email', [AuthController::class, 'PostForgot']);

Route::get('/reset_using_security_questions', function () {
    return view('reset_sq');
})->name('reset_sq');
Route::post('/resetsq', [AuthController::class, 'PostSecurityQuestions'])->name('post-reset-sq');

Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('register', [UserController::class, 'store'])->name('register.store');
Route::get('verify/{token}', [UserController::class, 'verify'])->name('verify');
Route::post('register/fetch-divisions', [UserController::class, 'fetchDivisions'])->name('register.fetchDivisions');
Route::post('register/fetch-positons', [UserController::class, 'fetchPositions'])->name('register.fetchPositions');
Route::post('check-philrice-id', [UserController::class, 'checkIfExists'])->name('check-if-exists');

Route::get('/reset/{token}', [AuthController::class, 'reset']);
Route::post('/reset/{token}', [AuthController::class, 'PostReset']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'AuthLogin'])->name('auth_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Guest
Route::group(['prefix' => 'guest'], function () {
    // Route::get('/overview', function () { return view('guest.overview'); })->name('guest.overview');
    Route::get('/overview', [TrainingsFormController::class, 'index'])->name('guest.overview');
    Route::post('/trainings/filter', [TrainingsFormController::class, 'filterAjax'])->name('filter_data_guest');

    Route::get('/view', [WebAnalyticsController::class, 'incrementSiteView'])->name('guest.view');

    Route::post('/overview-visitor-evaluation', [VisitorEvaluationController::class, 'store'])->name('evaluation.store');

    Route::post('/trainings/filter/station', [TrainingsFormController::class, 'filterAjaxStationOnly'])->name('filter_station_guest');

    Route::get('/ces', [TrainingsFormController::class, 'cesView'])->name('guest.ces');
    Route::get('/agusan', [TrainingsFormController::class, 'agusanView'])->name('guest.agusan');
    Route::get('/batac', [TrainingsFormController::class, 'batacView'])->name('guest.batac');
    Route::get('/bicol', [TrainingsFormController::class, 'bicolView'])->name('guest.bicol');
    Route::get('/cmu', [TrainingsFormController::class, 'cmuView'])->name('guest.cmu');
    Route::get('/isabela', [TrainingsFormController::class, 'isabelaView'])->name('guest.isabela');
    Route::get('/losbaños', [TrainingsFormController::class, 'losbañosView'])->name('guest.losbaños');
    Route::get('/midsayap', [TrainingsFormController::class, 'midsayapView'])->name('guest.midsayap');
    Route::get('/negros', [TrainingsFormController::class, 'negrosView'])->name('guest.negros');

});

// Super Admin
Route::group(['middleware' => 'super_admin'], function () {
        
    Route::get('/manage_encoderss', [UserController::class, 'superadminGetEncoders'])->name('super_admin.manage_encoders');
    Route::put('/promote_encoder/{id}', [UserController::class, 'promoteEncoder'])->name('super_admin.promote_encoder');
    Route::get('/manage_admins', [UserController::class, 'superadminGetAdmins'])->name('super_admin.manage_admins');
    Route::put('/demote_admin/{id}', [UserController::class, 'demoteAdmin'])->name('super_admin.demote_admin');

    Route::put('/blocks/{id}', [UserController::class, 'block'])->name('super_admin.blocks');
    Route::put('/unblocks/{id}', [UserController::class, 'unblock'])->name('super_admin.unblocks');

    Route::get('/web-analytics', function () {
        return view('super_admin.web_analytics');
    })->name('super_admin.web_analytics');

    // Route::get('/get-site-views', [WebAnalyticsController::class, 'fetchSiteView'])->name('fetch_view');
    // Route::get('/get-monthly-site-views', [WebAnalyticsController::class, 'fetchMonthlySiteViews'])->name('fetch_monthly_view');
    Route::get('/get-site-views', [WebAnalyticsController::class, 'fetchSiteViews'])->name('fetch_site_views');
    
    Route::get('/get-survey-records', [VisitorEvaluationController::class, 'getEvaluations'])->name('fetch_survey_records');

});

// Admin
Route::group(['middleware' => 'admin'], function () {

    Route::get('/manage_encoders', [UserController::class, 'adminGetEncoders'])->name('admin.manage_encoders');
    Route::put('/block/{id}', [UserController::class, 'block'])->name('admin.block');
    Route::put('/unblock/{id}', [UserController::class, 'unblock'])->name('admin.unblock');

});

// Encoder
Route::group(['middleware' => 'encoder'], function () {
    Route::group(['prefix' => 'encoder'], function () {
        // Route::get('/overview', [TrainingsFormController::class, 'index'])->name('encoder.overview');

        // Route::get('/view', [TrainingsFormController::class, 'authView'])->name('encoder.view');
        // Route::get('/add', [TrainingsFormController::class, 'authAddView'])->name('encoder.add');
        // Route::get('/edit', [TrainingsFormController::class, 'authEditView'])->name('encoder.edit');

        // Route::post('/trainings/filter', [TrainingsFormController::class, 'filterAjax'])->name('filter_data');

        // // Summary of Trainings Form
        // Route::group(['prefix' => 'trainings'], function () {
        //     Route::get('/form', [TrainingsFormController::class, 'create'])->name('trainingsform.create');
        //     Route::post('form-store', [TrainingsFormController::class, 'store'])->name('trainingsform.store');
        //     // Route::get('/form-edit/{id}', [TrainingsFormController::class, 'edit'])->name('trainingsform.edit');
        //     Route::get('/form-edit/{id}', [TrainingsFormController::class, 'edit'])->name('trainingsform.edit');
        //     Route::post('/form-update/{id}', [TrainingsFormController::class, 'update'])->name('trainingsform.update');
        //     Route::delete('/form-delete/{id}', [TrainingsFormController::class, 'destroy'])->name('trainingsform.delete');
        //     Route::post('/fetch-municipalities', [MunicipalityController::class, 'index'])->name('trainings.fetchMunicipalities');
        //     Route::post('/fetch-provinces', [ProvinceController::class, 'index'])->name('trainings.fetchProvinces');
        // });

        // // Export Data into excel
        // // composer require maatwebsite/excel
        // Route::post('/export/record', [TrainingsFormController::class, 'export'])->name('export.record');

        // Route::post('/trainings/filter/station', [TrainingsFormController::class, 'filterAjaxStationOnly'])->name('filter_station');
        // Route::get('/ces', [TrainingsFormController::class, 'cesView'])->name('encoder.ces');
        // Route::get('/agusan', [TrainingsFormController::class, 'agusanView'])->name('encoder.agusan');
        // Route::get('/batac', [TrainingsFormController::class, 'batacView'])->name('encoder.batac');
        // Route::get('/bicol', [TrainingsFormController::class, 'bicolView'])->name('encoder.bicol');
        // Route::get('/cmu', [TrainingsFormController::class, 'cmuView'])->name('encoder.cmu');
        // Route::get('/isabela', [TrainingsFormController::class, 'isabelaView'])->name('encoder.isabela');
        // Route::get('/losbaños', [TrainingsFormController::class, 'losbañosView'])->name('encoder.losbaños');
        // Route::get('/midsayap', [TrainingsFormController::class, 'midsayapView'])->name('encoder.midsayap');
        // Route::get('/negros', [TrainingsFormController::class, 'negrosView'])->name('encoder.negros');

    });
});

// Update Profile
Route::middleware(['auth'])->group(function () {

    Route::get('/overview', [TrainingsFormController::class, 'index'])->name('auth.overview');

    Route::get('/view', [TrainingsFormController::class, 'authView'])->name('auth.view');
    Route::get('/add', [TrainingsFormController::class, 'authAddView'])->name('auth.add');
    Route::get('/edit', [TrainingsFormController::class, 'authEditView'])->name('auth.edit');

    Route::post('/trainings/filter', [TrainingsFormController::class, 'filterAjax'])->name('filter_data');

    // Summary of Trainings Form
    Route::group(['prefix' => 'trainings'], function () {
        Route::get('/form', [TrainingsFormController::class, 'create'])->name('trainingsform.create');
        Route::post('form-store', [TrainingsFormController::class, 'store'])->name('trainingsform.store');
        // Route::get('/form-edit/{id}', [TrainingsFormController::class, 'edit'])->name('trainingsform.edit');
        Route::get('/form-edit/{id}', [TrainingsFormController::class, 'edit'])->name('trainingsform.edit');
        Route::post('/form-update/{id}', [TrainingsFormController::class, 'update'])->name('trainingsform.update');
        Route::delete('/form-delete/{id}', [TrainingsFormController::class, 'destroy'])->name('trainingsform.delete');
        Route::post('/fetch-municipalities', [MunicipalityController::class, 'index'])->name('trainings.fetchMunicipalities');
        Route::post('/fetch-provinces', [ProvinceController::class, 'index'])->name('trainings.fetchProvinces');
    });

    // Export Data into excel
    // composer require maatwebsite/excel
    Route::post('/export/record', [TrainingsFormController::class, 'export'])->name('export.record');

    Route::post('/trainings/filter/station', [TrainingsFormController::class, 'filterAjaxStationOnly'])->name('filter_station');
    Route::get('/ces', [TrainingsFormController::class, 'cesView'])->name('auth.ces');
    Route::get('/agusan', [TrainingsFormController::class, 'agusanView'])->name('auth.agusan');
    Route::get('/batac', [TrainingsFormController::class, 'batacView'])->name('auth.batac');
    Route::get('/bicol', [TrainingsFormController::class, 'bicolView'])->name('auth.bicol');
    Route::get('/cmu', [TrainingsFormController::class, 'cmuView'])->name('auth.cmu');
    Route::get('/isabela', [TrainingsFormController::class, 'isabelaView'])->name('auth.isabela');
    Route::get('/losbaños', [TrainingsFormController::class, 'losbañosView'])->name('auth.losbaños');
    Route::get('/midsayap', [TrainingsFormController::class, 'midsayapView'])->name('auth.midsayap');
    Route::get('/negros', [TrainingsFormController::class, 'negrosView'])->name('auth.negros');
    

    Route::get('/profile/{id}', [UserController::class, 'showProfile'])->name('profile');

    Route::put('/updateProfile', [UserController::class, 'updateProfile'])->name('updateProfile');

    // Route::post('profile/fetch-divisions', [UserController::class, 'fetchDivisions'])->name('profile.fetchDivisions');
    // Route::post('profile/fetch-positons', [UserController::class, 'fetchPositions'])->name('profile.fetchPositions');
});
