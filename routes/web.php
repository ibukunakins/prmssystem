<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;

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
    if(Auth::check()) {
        return redirect('dashboard');
    } else {
        return redirect('login');
        
    }
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['staff', 'verified'])->prefix('account')->name('accounts.')->group(function(){

        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::group(['prefix' => 'patients', 'as' => 'patients.'], function(){
            Route::get('/', [PatientController::class, 'index'])->name('index');
            Route::get('/create', [PatientController::class, 'create'])->name('create');
            Route::post('/', [PatientController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [PatientController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [PatientController::class, 'update'])->name('update');
            Route::delete('/', [PatientController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'appointments', 'as' => 'appointments.'], function(){
            Route::get('/', [AppointmentController::class, 'index'])->name('index');
            Route::get('/create', [AppointmentController::class, 'create'])->name('create');
            Route::post('/', [AppointmentController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [AppointmentController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [AppointmentController::class, 'update'])->name('update');
            Route::delete('/{id}', [AppointmentController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'admissions', 'as' => 'admissions.'], function(){
            Route::get('/', [AdmissionController::class, 'index'])->name('index');
            Route::get('/create', [AdmissionController::class, 'create'])->name('create');
            Route::post('/', [AdmissionController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [AdmissionController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [AdmissionController::class, 'update'])->name('update');
            Route::delete('/', [AdmissionController::class, 'destroy'])->name('destroy');
        });

    });

    Route::middleware(['verified', 'admin'])->prefix('account')->name('accounts.')->group(function (){
        
        Route::group(['prefix' => 'staff', 'as' => 'staff.'], function (){
            Route::get('/', [StaffController::class, 'index'])->name('index');
            Route::get('/create', [StaffController::class, 'create'])->name('create');
            Route::post('/', [StaffController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [StaffController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [StaffController::class, 'update'])->name('update');
            Route::delete('/', [StaffController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'settings', 'as' => 'settings.'], function (){
            Route::get('/', [SettingController::class, 'index'])->name('index');
            Route::get('/create', [SettingController::class, 'create'])->name('create');
            Route::post('/', [SettingController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [SettingController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [SettingController::class, 'update'])->name('update');
            Route::delete('/{id}', [SettingController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'services', 'as' => 'services.'], function (){
            Route::get('/', [ServiceController::class, 'index'])->name('index');
            Route::get('/create', [ServiceController::class, 'create'])->name('create');
            Route::post('/', [ServiceController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [ServiceController::class, 'update'])->name('update');
            Route::delete('/', [ServiceController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'departments', 'as' => 'departments.'], function (){
            Route::get('/', [DepartmentController::class, 'index'])->name('index');
            Route::get('/create', [DepartmentController::class, 'create'])->name('create');
            Route::post('/', [DepartmentController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [DepartmentController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [DepartmentController::class, 'update'])->name('update');
            Route::delete('/', [DepartmentController::class, 'destroy'])->name('destroy');
        });

    });
});

require __DIR__.'/auth.php';
