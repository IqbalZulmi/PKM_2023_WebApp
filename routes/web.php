<?php

use App\Http\Controllers\HumidityController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
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

// Route::get('/', ([HumidityController::class,'getHumidity']))
// ->name('landingPage');

// Route::get('/login', [LoginController::class, 'Login'])
// ->name('login');

Route::get('/', [DashboardController::class, 'Home'])
 ->name('Home');

