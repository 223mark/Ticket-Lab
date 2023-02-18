<?php

use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\OperatorController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RouteController;
use App\Http\Controllers\Admin\TicketController;
use App\Models\Location;
use App\Models\TicketcodeList;
use Illuminate\Support\Facades\Route;

/*
 name convenction...
  //index - all showing 
  // create - create page to store
  // store - store new data
  // edit - indicate edit page
  // update - update related data
  //destory - destory related data
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    //authorization
    Route::group(['prefix' => 'auth'], function () {
        Route::get('register', [AuthController::class, 'registerPage'])->name('auth#register');
        Route::get('login', [AuthController::class, 'loginPage'])->name('auth#login');
        Route::get('password/reset/page', [AuthController::class, 'passwordResetPage'])->name('auth#passwordResetPage');
    });

    //admin profile
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [ProfileController::class, 'profile'])->name('profile#index');
        Route::post('/update', [ProfileController::class, 'update'])->name('profile#update');
        Route::get('/password/change/page', [ProfileController::class, 'passwordChagePage'])->name('profile#passwordChangePage');
        Route::post('/password/update', [ProfileController::class, 'passwordUpdate'])->name('profile#passwordUpdate');
    });

    //dashboard
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard#index');
    });

    //order 
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/index', [OrderController::class, 'index'])->name('orders#index');
        Route::get('/{id}/ticket/details', [OrderController::class, 'ticketDetail'])->name('orders#ticketDetail');
        // Route::post('/perPage', [OrderController::class, 'perPage'])->name('orders#perPage');
    });

    //operators
    Route::group(['prefix' => 'operators'], function () {
        Route::get('/index', [OperatorController::class, 'index'])->name('operators#index');
        Route::post('/store', [OperatorController::class, 'store'])->name('operators#store');
        Route::get('/{operator}edit', [OperatorController::class, 'edit'])->name('operators#edit');
        Route::post('/{operator}/update', [OperatorController::class, 'update'])->name('operators#update');
        Route::get('/{operator}/destory', [OperatorController::class, 'destory'])->name('operators#destory');
        Route::get('/{operator}/detial', [OperatorController::class, 'deatil'])->name('operators#deatil');

        //tickets
        Route::get('/{id}/table/', [OperatorController::class, 'ticketCode'])->name('operators#ticketCode');

        //filter
        //Route::get('/filter', [AjaxController::class, 'operatorFilterbySearch']);
    });

    //tickets
    Route::group(['prefix' => 'tickets'], function () {
        Route::get('/index', [TicketController::class, 'index'])->name('tickets#index');
        Route::get('/{code}/show', [TicketController::class, 'show'])->name('tickets#show');
        Route::get('/{id}/create', [TicketController::class, 'create'])->name('tickets#create');
        Route::post('/store', [TicketController::class, 'store'])->name('tickets#store');
        Route::get('/{ticket}/edit', [TicketController::class, 'edit'])->name('tickets#edit');
        Route::get('/{ticketCode}/destory', [TicketController::class, 'destory'])->name('tickets#destory');
    });

    //bus routes
    Route::group(['prefix' => 'routes'], function () {
        Route::get('/index', [RouteController::class, 'index'])->name('busRoutes#index');
        Route::post('/store', [RouteController::class, 'store'])->name('busRoutes#store');
        Route::get('/{route}/edit', [RouteController::class, 'edit'])->name('busRoutes#edit');
        Route::post('/{route}/update', [RouteController::class, 'update'])->name('busRoutes#update');
        Route::get('/{route}/destory', [RouteController::class, 'destory'])->name('busRoutes#destory');
    });



    //loacations
    Route::group(['prefix' => 'locations'], function () {
        Route::get('/index', [LocationController::class, 'index'])->name('locations#index');
        Route::post('/store', [LocationController::class, 'store'])->name('locations#store');
        Route::get('/{location}/destory', [LocationController::class, 'destory'])->name('locations#destory');
    });


    Route::group(['prefix' => 'ajax'], function () {
        Route::get('operators/filter', [AjaxController::class, 'operatorFilterbySelect']);
    });
});
