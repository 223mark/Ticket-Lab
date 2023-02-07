<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\V1\LocationController;
use App\Http\Controllers\Api\V1\OperatorController;
use App\Http\Controllers\Api\V1\TicketController;
use App\Http\Controllers\TestController;
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





Route::group(['prefix' => 'v1',], function () {

    Route::apiResource('operators', OperatorController::class);
    Route::apiResource('tickets', TicketController::class);
    Route::apiResource('locations', LocationController::class);
});
