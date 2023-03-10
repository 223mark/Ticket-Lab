<?php

use App\Http\Controllers\Api\V1\OrderController;
use App\Http\Controllers\Api\V1\LocationController;
use App\Http\Controllers\Api\V1\OperatorController;
use App\Http\Controllers\Api\V1\TicketController;
use App\Http\Controllers\Api\V1\GroupByTicketController;
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




//api/v1
Route::group(['prefix' => 'v1',], function () {
    //operators
    Route::apiResource('operators', OperatorController::class);
    //locations
    Route::apiResource('locations', LocationController::class);
    //groupBy tickets
    Route::apiResource('gb-tickets', GroupByTicketController::class);
    //tickets
    Route::apiResource('tickets', TicketController::class);
    //order 
    Route::apiResource('orders/', OrderController::class);
});
