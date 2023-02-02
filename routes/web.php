<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BusController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\OperatorController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RouteController;
use App\Http\Controllers\Admin\TicketController;
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
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard#index');
    });
    Route::group(['prefix' => 'operators'], function () {
        Route::get('/index', [OperatorController::class, 'index'])->name('operators#index');
        Route::post('/store', [OperatorController::class, 'store'])->name('operators#store');
        Route::get('edit/{operator}', [OperatorController::class, 'edit'])->name('operators#edit');
        Route::post('update/{operator}', [OperatorController::class, 'update'])->name('operators#update');
        Route::get('destory/{operator}', [OperatorController::class, 'destory'])->name('operators#destory');

        //tickets
        Route::get('/{id}/code/table/', [OperatorController::class, 'ticketCode'])->name('operators#ticketCode');
        // Route::group(['prefix' => 'tickets'], function () {

        // });
        // Route::group(['prefix' => 'tickets'], function () {
        //     Route::get('/codes/{id}', [TicketController::class, 'ticketCode'])->name('tickets#ticketcodes');
        // });
    });


    //loacations
    Route::group(['prefix' => 'locations'], function () {
        Route::get('/index', [LocationController::class, 'index'])->name('locations#index');
        Route::post('/store', [LocationController::class, 'store'])->name('locations#store');
    });

    // //tickets
    Route::group(['prefix' => 'tickets'], function () {
        Route::get('/index', [TicketController::class, 'index'])->name('tickets#index');
        Route::get('{code}/create/', [TicketController::class, 'create'])->name('tickets#create');
        Route::post('/store', [TicketController::class, 'store'])->name('tickets#store');
        Route::get('/edit/{ticket}', [TicketController::class, 'edit'])->name('tickets#edit');
        Route::get('/destory/{ticket}', [TicketController::class, 'destory'])->name('tickets#destory');


        Route::group(['prefix' => 'codes'], function () {
            Route::get('/index', [RouteController::class, 'index'])->name('ticketCode#index');
            // Route::get('/{ticketCode}/filter', [RouteController::class, 'filterbyTicketcode'])->name('tickets#filterbycode');
            Route::post('/store', [RouteController::class, 'store'])->name('ticketCode#store');
        });
    });

    Route::group(['prefix' => 'auth'], function () {
        Route::get('register', [AuthController::class, 'registerPage'])->name('auth#register');
        Route::get('login', [AuthController::class, 'loginPage'])->name('auth#login');
        Route::get('password/reset/page', [AuthController::class, 'passwordResetPage'])->name('auth#passwordResetPage');
    });

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [ProfileController::class, 'profile'])->name('profile#index');
        Route::get('/password/change/page', [ProfileController::class, 'passwordChagePage'])->name('profile#passwordChangePage');
    });
});
