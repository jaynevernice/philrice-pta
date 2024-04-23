<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KSLFormController;
use App\Http\Controllers\DispatchFormController;
use App\Http\Controllers\KSLAnalyticsController;
use App\Http\Controllers\TrainingsFormController;

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

Route::get('/reset/{token}', [AuthController::class, 'reset']);
Route::post('/reset/{token}', [AuthController::class, 'PostReset']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'AuthLogin'])->name('auth_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Guest
Route::group(['prefix' => 'guest'], function () {
    Route::get('/overview', function () {
        return view('guest.overview');
    })->name('guest.overview');

    Route::get('/ces', function () {
        return view('guest.ces');
    })->name('guest.ces');

    Route::get('/batac', function () {
        return view('guest.batac');
    })->name('guest.batac');

    Route::get('/agusan', function () {
        return view('guest.agusan');
    })->name('guest.agusan');

    Route::get('/bicol', function () {
        return view('guest.bicol');
    })->name('guest.bicol');

    Route::get('/isabela', function () {
        return view('guest.isabela');
    })->name('guest.isabela');

    Route::get('/losbaños', function () {
        return view('guest.losbaños');
    })->name('guest.losbaños');

    Route::get('/midsayap', function () {
        return view('guest.midsayap');
    })->name('guest.midsayap');

    Route::get('/negros', function () {
        return view('guest.negros');
    })->name('guest.negros');
});

// Super Admin
Route::group(['middleware' => 'super_admin'], function () {
    Route::group(['prefix' => 'super_admin'], function () {
        Route::get('/overview', function () {
            return view('super_admin.overview');
        })->name('super_admin.overview');

        Route::get('/ces_view', function () {
            return view('super_admin.ces_view');
        })->name('super_admin.ces_view');

        Route::get('/ces_add', function () {
            return view('super_admin.ces_add');
        })->name('super_admin.ces_add');

        Route::get('/ces_edit', function () {
            return view('super_admin.ces_edit');
        })->name('super_admin.ces_edit');

        Route::get('/batac', function () {
            return view('super_admin.batac');
        })->name('super_admin.batac');

        Route::get('/agusan', function () {
            return view('super_admin.agusan');
        })->name('super_admin.agusan');

        Route::get('/bicol', function () {
            return view('super_admin.bicol');
        })->name('super_admin.bicol');

        Route::get('/isabela', function () {
            return view('super_admin.isabela');
        })->name('super_admin.isabela');

        Route::get('/losbaños', function () {
            return view('super_admin.losbaños');
        })->name('super_admin.losbaños');

        Route::get('/midsayap', function () {
            return view('super_admin.midsayap');
        })->name('super_admin.midsayap');

        Route::get('/negros', function () {
            return view('super_admin.negros');
        })->name('super_admin.negros');

        Route::get('/manage_encoders', [UserController::class, 'superadminGetEncoders'])->name('super_admin.manage_encoders');
        Route::put('/promote_encoder/{id}', [UserController::class, 'promoteEncoder'])->name('super_admin.promote_encoder');
        Route::get('/manage_admins', [UserController::class, 'superadminGetAdmins'])->name('super_admin.manage_admins');
        Route::put('/demote_admin/{id}', [UserController::class, 'demoteAdmin'])->name('super_admin.demote_admin');

        Route::put('/block/{id}', [UserController::class, 'block'])->name('super_admin.block');
        Route::put('/unblock/{id}', [UserController::class, 'unblock'])->name('super_admin.unblock');

        // Route::get('/profile', function () {
        //     return view('profile');
        // })->name('profile');

        // Route::put('/updateProfile', [UserController::class, 'updateProfile'])->name('updateProfile');
        // Route::put('/updateSecurityQuestions', [UserController::class, 'updateSecurityQuestions'])->name('updateSecurityQuestions');
        // Route::put('/updatePassword', [UserController::class, 'updatePassword'])->name('updatePassword');
    });
});

// Admin
Route::group(['middleware' => 'admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/overview', function () {
            return view('admin.overview');
        })->name('admin.overview');

        Route::get('/ces_view', function () {
            return view('admin.ces_view');
        })->name('admin.ces_view');

        Route::get('/ces_add', function () {
            return view('admin.ces_add');
        })->name('admin.ces_add');

        Route::get('/ces_edit', function () {
            return view('admin.ces_edit');
        })->name('admin.ces_edit');

        Route::get('/agusan', function () {
            return view('admin.agusan');
        })->name('admin.agusan');

        Route::get('/batac', function () {
            return view('admin.batac');
        })->name('admin.batac');

        Route::get('/bicol', function () {
            return view('admin.bicol');
        })->name('admin.bicol');

        Route::get('/isabela', function () {
            return view('admin.isabela');
        })->name('admin.isabela');

        Route::get('/losbaños', function () {
            return view('admin.losbaños');
        })->name('admin.losbaños');

        Route::get('/midsayap', function () {
            return view('admin.midsayap');
        })->name('admin.midsayap');

        Route::get('/negros', function () {
            return view('admin.negros');
        })->name('admin.negros');

        // Route::get('/manage_encoders', function () {
        //     return view('admin.manage_encoders');
        // })->name('admin.manage_encoders');
        // Route::put('/promote_encoder/{id}', [UserController::class, 'promoteEncoder'])->name('admin.promote_encoder');
        Route::get('/manage_encoders', [UserController::class, 'adminGetEncoders'])->name('admin.manage_encoders');
        Route::put('/block/{id}', [UserController::class, 'block'])->name('admin.block');
        Route::put('/unblock/{id}', [UserController::class, 'unblock'])->name('admin.unblock');
    });
});

// Encoder
Route::group(['middleware' => 'encoder'], function () {
    Route::group(['prefix' => 'encoder'], function () {
        // Route::get('/profile', function () {
        //     return view('profile');
        // })->name('profile');

        // Route::put('/updateProfile', [UserController::class, 'updateProfile'])->name('updateProfile');
        // Route::put('/updateSecurityQuestions', [UserController::class, 'updateSecurityQuestions'])->name('updateSecurityQuestions');
        // Route::put('/updatePassword', [UserController::class, 'updatePassword'])->name('updatePassword');

        // Route::get('/overview', function () {
        //     return view('encoder.overview');
        // })->name('encoder.overview');
        Route::get('/overview', [TrainingsFormController::class, 'index'])->name('encoder.overview');

        // Route::get('/ces_view', function () {
        //     return view('encoder.ces_view');
        // })->name('encoder.ces_view');
        Route::get('/ces_view', [TrainingsFormController::class, 'cesView'])->name('encoder.ces_view');

        Route::get('/ces_add', function () {
            return view('encoder.ces_add');
        })->name('encoder.ces_add');

        // live search and filter
        Route::get('/ces_edit', [TrainingsFormController::class, 'cesEditView'])->name('encoder.ces_edit');
        Route::post('/trainings/filter', [TrainingsFormController::class, 'filterAjax'])->name('filter_data');

        // Summary of Trainings Form
        Route::group(['prefix' => 'trainings'], function () {
            Route::get('/form', [TrainingsFormController::class, 'create'])->name('trainingsform.create');
            Route::post('form-store', [TrainingsFormController::class, 'store'])->name('trainingsform.store');
            // Route::get('/form-edit/{id}', [TrainingsFormController::class, 'edit'])->name('trainingsform.edit');
            Route::post('/form-edit/{id}', [TrainingsFormController::class, 'edit'])->name('trainingsform.edit');
            Route::post('/form-update/{id}', [TrainingsFormController::class, 'update'])->name('trainingsform.update');
            Route::delete('/form-delete/{id}', [TrainingsFormController::class, 'destroy'])->name('trainingsform.delete');
        });

        // Export Data into excel
        // composer require maatwebsite/excel
        Route::post('/export/record', [TrainingsFormController::class, 'export'])->name('export.record');

        Route::get('/agusan', function () {
            return view('encoder.agusan');
        })->name('encoder.agusan');

        Route::get('/batac', function () {
            return view('encoder.batac');
        })->name('encoder.batac');

        Route::get('/bicol', function () {
            return view('encoder.bicol');
        })->name('encoder.bicol');

        Route::get('/isabela', function () {
            return view('encoder.isabela');
        })->name('encoder.isabela');

        Route::get('/losbaños', function () {
            return view('encoder.losbaños');
        })->name('encoder.losbaños');

        Route::get('/midsayap', function () {
            return view('encoder.midsayap');
        })->name('encoder.midsayap');

        Route::get('/negros', function () {
            return view('encoder.negros');
        })->name('encoder.negros');
    });
});

// KSL Monitoring
Route::group(['prefix' => 'ksl'], function () {
    Route::get('/form', [KSLFormController::class, 'index'])->name('kslform.index');
    Route::get('/analytics', [KSLAnalyticsController::class, 'index'])->name('kslanalytics.index');
});

// Summary of Trainings
Route::group(['prefix' => 'trainings'], function () {
    Route::get('/form', [TrainingsFormController::class, 'index'])->name('trainingsform.index');
});

// Technical Dispatch
Route::group(['prefix' => 'dispatch'], function () {
    Route::get('/form', [DispatchFormController::class, 'index'])->name('dispatchform.index');
});

// Techno Demo
Route::get('/technodemo', function () {
    return view('technodemo');
})->name('technodemo');

// Route::get('/profile/{user}', function () { return view('profile'); })->name('profile');
// Route::put('/updateProfile', [UserController::class, 'updateProfile'])->name('updateProfile');
// Route::put('/updateSecurityQuestions', [UserController::class, 'updateSecurityQuestions'])->name('updateSecurityQuestions');
// Route::put('/updatePassword', [UserController::class, 'updatePassword'])->name('updatePassword');

// Route::get('/profile/{id}', function ($id) {
//     if (Auth::id() != $id) {
//         abort(403, 'Unauthorized action.'); // Display a 403 Forbidden error
//     }

//     return view('profile');
// })
//     ->middleware('auth')
//     ->name('profile');

// Route::put('/updateProfile', [UserController::class, 'updateProfile'])
//     ->middleware('auth')
//     ->name('updateProfile');
// Route::put('/updateSecurityQuestions', [UserController::class, 'updateSecurityQuestions'])
//     ->middleware('auth')
//     ->name('updateSecurityQuestions');
// Route::put('/updatePassword', [UserController::class, 'updatePassword'])
//     ->middleware('auth')
//     ->name('updatePassword');

// Update Profile
Route::middleware(['auth'])->group(function () {
    // Profile routes
    Route::get('/profile/{id}', function ($id) {
        if (Auth::id() != $id) {
            abort(403, 'Unauthorized action.');
        }
        return view('profile');
    })->name('profile');

    // Update profile routes
    Route::put('/updateProfile', [UserController::class, 'updateProfile'])
        ->name('updateProfile');
    Route::put('/updateSecurityQuestions', [UserController::class, 'updateSecurityQuestions'])
        ->name('updateSecurityQuestions');
    Route::put('/updatePassword', [UserController::class, 'updatePassword'])
        ->name('updatePassword');
});

