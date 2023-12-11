<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('/bookings', BookingsController::class);
Route::post('/bookings/xml/upload', [BookingsController::class, 'storeFile']);
Route::post('/bookings/{id}/xml', [BookingsController::class, 'updateFile']);
