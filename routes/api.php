<?php

use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\AdvertisementController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PhoneController;
use App\Http\Controllers\Api\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::resource('user', UserController::class);
Route::resource('phone', PhoneController::class);
Route::resource('address', AddressController::class);
Route::apiResource('advertisement', AdvertisementController::class);