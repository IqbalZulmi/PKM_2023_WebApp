<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanSensor;
use Illuminate\Support\Facades\Route;

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:pelanggan'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'showDashboardPage'])->name('dashboardPage');
    Route::get('/dashboard/detail/{id_titik}', [DashboardController::class, 'showDashboardDetailPage'])->name('dashboardDetailPage');
});

Route::middleware(['auth', 'role:pengelola'])->group(function () {
    Route::get('/sensor-reports', [LaporanSensor::class, 'showLaporanSensorPage'])->name('laporanSensorPage');
});

Route::middleware('guest')->group(function(){
    Route::get('/', [LandingController::class, 'showLandingPage'])->name('landingPage');
    Route::get('/login', [AuthController::class, 'showLoginPage'])->name('loginPage');
    Route::post('/proses-login', [AuthController::class, 'loginProcess'])->name('loginProcess');
    Route::get('/register', [AuthController::class, 'showRegisterPage'])->name('registerPage');
    Route::post('/proses-register', [AuthController::class, 'registerProcess'])->name('registerProcess');
});
