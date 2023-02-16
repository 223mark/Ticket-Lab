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
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
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

    //order 
    Route::group(['prefix' => 'order'], function () {
        Route::get('/index', [OrderController::class, 'index'])->name('orders#index');
    });

    //dashboard
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard#index');
    });

    //operators
    Route::group(['prefix' => 'operators'], function () {
        Route::get('/index', [OperatorController::class, 'index'])->name('operators#index');
        Route::post('/store', [OperatorController::class, 'store'])->name('operators#store');
        Route::get('edit/{operator}', [OperatorController::class, 'edit'])->name('operators#edit');
        Route::post('update/{operator}', [OperatorController::class, 'update'])->name('operators#update');
        Route::get('destory/{operator}', [OperatorController::class, 'destory'])->name('operators#destory');

        //tickets
        Route::get('/{id}/table/', [OperatorController::class, 'ticketCode'])->name('operators#ticketCode');

        //filter
        Route::get('/filter', [AjaxController::class, 'operatorFilterbySearch']);
    });

    // //tickets
    Route::group(['prefix' => 'tickets'], function () {
        Route::get('/index', [TicketController::class, 'index'])->name('tickets#index');
        Route::get('/show/{code}', [TicketController::class, 'show'])->name('tickets#show');
        Route::get('/create/{id}', [TicketController::class, 'create'])->name('tickets#create');
        Route::post('/store', [TicketController::class, 'store'])->name('tickets#store');
        Route::get('/edit/{ticket}', [TicketController::class, 'edit'])->name('tickets#edit');
        Route::get('/destory/{ticketCode}', [TicketController::class, 'destory'])->name('tickets#destory');
    });
    Route::group(['prefix' => 'routes'], function () {
        Route::get('/index', [RouteController::class, 'index'])->name('busRoutes#index');
        Route::post('/store', [RouteController::class, 'store'])->name('busRoutes#store');
        Route::get('/edit/{route}', [RouteController::class, 'edit'])->name('busRoutes#edit');
        Route::post('/update/{route}', [RouteController::class, 'update'])->name('busRoutes#update');
        Route::get('/destory/{route}', [RouteController::class, 'destory'])->name('busRoutes#destory');
        //filter
        // Route::get('/index', [RouteController::class, 'filter'])->name('busRoutes#filter');
    });


    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [ProfileController::class, 'profile'])->name('profile#index');
        Route::post('/update', [ProfileController::class, 'update'])->name('profile#update');
        Route::get('/password/change/page', [ProfileController::class, 'passwordChagePage'])->name('profile#passwordChangePage');
    });

    //loacations
    Route::group(['prefix' => 'locations'], function () {
        Route::get('/index', [LocationController::class, 'index'])->name('locations#index');
        Route::post('/store', [LocationController::class, 'store'])->name('locations#store');
        Route::get('/destory/{location}', [LocationController::class, 'destory'])->name('locations#destory');
        //filter
        //Route::post('/index', [LocationController::class, 'filter'])->name('locations#filter');
    });


    Route::group(['prefix' => 'ajax'], function () {
        Route::get('operators/filter', [AjaxController::class, 'operatorFilterbySelect']);
    });
});
