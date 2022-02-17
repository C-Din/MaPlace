<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserTicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('events', EventController::class);
Route::resource('locations', LocationController::class);
Route::resource('payments', PaymentController::class);
Route::resource('paymentmethods', PaymentMethodController::class);
Route::resource('tickets', TicketController::class);
Route::resource('tickettypes', TicketTypeController::class);
Route::resource('userss', UserController::class);
Route::resource('usertickets', UserTicketController::class);

