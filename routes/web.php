<?php

use App\Http\Controllers\InboundController;
use App\Http\Controllers\OutboundController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

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
    return redirect('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/users', function () {
        return view('users');
    })->name('users');

    Route::get('/stats', function () {
        return view('stats');
    })->name('stats');

    Route::get('/outbound', function () {
        return view('outbound');
    })->name('outbound');

    Route::get('/inbound', function () {
        return view('inbound');
    })->name('inbound');

    Route::get('/product', function () {
        return view('product');
    })->name('product');

    Route::get('/stock', function () {
        return view('stock');
    })->name('stock');

    Route::get('/dashboard', [DashboardController::class, 'display'])->name('dashboard');
    Route::post('product-add', [ProductController::class, 'store']);
    Route::post('inbound-add', [InboundController::class, 'store']);
    Route::post('outbound-add', [OutboundController::class, 'store']);
    Route::post('user-add', [UserController::class, 'store']);
});