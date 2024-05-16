<?php

use App\Http\Controllers\HumidityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/addHumidity', [HumidityController::class, 'storeHumidity'])
->name('addHumidity');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
