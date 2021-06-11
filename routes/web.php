<?php

use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminTicketController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserOrdersController;
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


Route::group(['middleware'=>'auth'],function (){
    
    Route::view('dashboard','dashboard')->name('dashboard');
    Route::resource('orders', UserOrdersController::class)->name('create' , 'order.create');
    Route::post('orders/{order}/download',[UserOrdersController::class , 'download']);
    Route::get('orders/{order}/payment',[UserOrdersController::class , 'showPayment']);
    Route::post('orders/{order}/payment',[UserOrdersController::class , 'payment']);
    Route::resource('tickets',TicketsController::class);
});

Route::group(['prefix' => 'admin' , 'middleware' => 'admin'],function (){
    Route::view('/', 'Admin.admin');
    Route::resource('admin/users', UserController::class)
    ->name('index','admin.users')
    ->name('create', 'admin.user.create')
    ->name('store' , 'admin.users.store');

    Route::resource('orders', AdminOrderController::class);
    Route::get('orders/{id}/setCost', [AdminOrderController::class , 'setCost']);
    Route::post('orders/{id}/setCost', [AdminOrderController::class , 'storeCost']);
    Route::post('orders/{id}/download',[AdminOrderController::class , 'download']);
    Route::get('orders/{id}/reject',[AdminOrderController::class , 'showReject']);
    Route::post('orders/{id}/reject',[AdminOrderController::class , 'reject']);

    Route::resource('/tickets', AdminTicketController::class);
    Route::post('/tickets/{ticket}/close', [AdminTicketController::class , 'close']);
    
});