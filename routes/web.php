<?php

use App\Http\Controllers\Frontsite\AppointmentController;
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\PaymentController;
use App\Http\Controllers\Backsite\DashboardController;
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
});
