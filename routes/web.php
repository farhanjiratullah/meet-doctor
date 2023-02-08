<?php

use App\Http\Controllers\Backsite\ConfigPaymentController;
use App\Http\Controllers\Backsite\ConsultationController;
use App\Http\Controllers\Frontsite\AppointmentController;
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\PaymentController;
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\DoctorController;
use App\Http\Controllers\Backsite\PermissionController;
use App\Http\Controllers\Backsite\RoleController;
use App\Http\Controllers\Backsite\TypeUserController;
use App\Http\Controllers\Backsite\SpecialistController;
use App\Http\Controllers\Backsite\TransactionController;
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
    Route::get('/appointment', AppointmentController::class)->name('appointment'); 
    Route::get('/payment', PaymentController::class)->name('payment'); 
});

Route::middleware([
    'auth',
])->prefix('backsite')->as('backsite.')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/type-users', TypeUserController::class)->name('type-users');
    Route::resource('/specialists', SpecialistController::class)->except('create');
    Route::resource('/doctors', DoctorController::class)->except('create');
    Route::resource('/config-payment', ConfigPaymentController::class)->only(['index', 'edit', 'update']);
    Route::resource('/consultations', ConsultationController::class)->except('create');
    Route::resource('/permissions', PermissionController::class)->only('index');
    Route::resource('/roles', RoleController::class)->except('create');
    Route::resource('/appointments', AppointmentController::class)->only('index');
    Route::resource('/transactions', TransactionController::class)->only('index');
    Route::resource('/hospital-patients', TransactionController::class)->only('index');
});
