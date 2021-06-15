<?php

use App\Http\Controllers\InboundController;
use App\Http\Controllers\OutboundController;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/stock', function () {
    return view('stock');
})->name('stock');

Route::middleware(['auth:sanctum', 'verified'])->get('/product', function () {
    return view('product');
})->name('product');

Route::middleware(['auth:sanctum', 'verified'])->get('/inbound', function () {
    return view('inbound');
})->name('inbound');

Route::middleware(['auth:sanctum', 'verified'])->get('/outbound', function () {
    return view('outbound');
})->name('outbound');

Route::middleware(['auth:sanctum', 'verified'])->get('/users', function () {
    return view('users');
})->name('users');

Route::middleware(['auth:sanctum', 'verified'])->get('/stats', function () {
    return view('stats');
})->name('stats');

Route::middleware(['auth:sanctum', 'verified'])->post('product-add', [ProductController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->post('inbound-add', [InboundController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->post('outbound-add', [OutboundController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->post('user-add', [UserController::class, 'store']);