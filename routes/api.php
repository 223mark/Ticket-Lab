<?php

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

    Route::apiResource('operators', OperatorController::class);
    Route::apiResource('locations', LocationController::class);
    //ticket
    Route::apiResource('gb-tickets', GroupByTicketController::class);
    Route::apiResource('tickets', TicketController::class);
});
