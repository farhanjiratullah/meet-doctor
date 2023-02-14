<?php

use App\Http\Controllers\Backsite\ConfigPaymentController;
use App\Http\Controllers\Backsite\ConsultationController;
use App\Http\Controllers\Frontsite\AppointmentController as FrontsiteAppointmentController;
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\PaymentController;
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\DoctorController;
use App\Http\Controllers\Backsite\HospitalPatientController;
use App\Http\Controllers\Backsite\PermissionController;
use App\Http\Controllers\Backsite\RoleController;
use App\Http\Controllers\Backsite\AppointmentController as BacksiteAppointmentController;
use App\Http\Controllers\Backsite\TypeUserController;
use App\Http\Controllers\Backsite\SpecialistController;
use App\Http\Controllers\Backsite\TransactionController;
use App\Http\Controllers\Backsite\UserController;
use App\Http\Controllers\Frontsite\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', LandingController::class)->name('landing');
Route::middleware('auth')->group(function() {
    Route::get('/register/success', RegisterController::class)->name('register.success');
    Route::get('/appointment/doctor/{doctor}', [FrontsiteAppointmentController::class, 'appointment'])->name('appointment');
    Route::post('/appointment/doctor/{doctor}', [FrontsiteAppointmentController::class, 'store'])->name('appointment.store'); 
    Route::get('/payment/appointment/{appointment}', [PaymentController::class, 'payment'])->name('payment'); 
    Route::post('/payment/appointment/{appointment}', [PaymentController::class, 'store'])->name('payment.store'); 
    Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
});

Route::middleware([
    'auth',
])->prefix('backsite')->as('backsite.')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/type-users', TypeUserController::class)->name('type-users');
    Route::resource('specialists', SpecialistController::class)->except('create');
    Route::resource('doctors', DoctorController::class)->except('create');
    Route::resource('config-payment', ConfigPaymentController::class)->only(['index', 'edit', 'update']);
    Route::resource('consultations', ConsultationController::class)->except('create');
    Route::resource('permissions', PermissionController::class)->only('index');
    Route::resource('roles', RoleController::class)->except('create');
    Route::resource('appointments', BacksiteAppointmentController::class)->only('index');
    Route::resource('transactions', TransactionController::class)->only('index');
    Route::resource('hospital-patients', HospitalPatientController::class)->only('index');
    Route::resource('users', UserController::class)->except('create');
});
