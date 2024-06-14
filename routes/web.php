<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanSensor;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){
    Route::get('/', [LandingController::class, 'showLandingPage'])->name('landingPage');

    Route::get('/login', [AuthController::class, 'showLoginPage'])->name('loginPage');
    Route::post('/proses-login', [AuthController::class, 'loginProcess'])->name('loginProcess');

    Route::get('/register', [AuthController::class, 'showRegisterPage'])->name('registerPage');
    Route::post('/proses-register', [AuthController::class, 'registerProcess'])->name('registerProcess');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/not-subscriber', [AuthController::class, 'showNotSubscriberPage'])->name('accountNotSubscriber');
});

Route::get('/dashboard', [DashboardController::class, 'showDashboardPage'])->name('dashboardPage');
Route::get('/dashboard/detail/{id_titik}', [DashboardController::class, 'showDashboardDetailPage'])->name('dashboardDetailPage');

Route::middleware(['auth','cekStatus'])->group(function () {
    Route::get('/sensor-reports', [LaporanSensor::class, 'showLaporanSensorPage'])->name('laporanSensorPage');
});

Route::middleware(['role:pengelola'])->group(function () {
});
