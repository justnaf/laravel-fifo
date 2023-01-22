<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\TesController;

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

Route::get('/tes', [TesController::class, 'index'])->name('tes.index');

Route::get("/", [DashController::class,'index']);
Route::resource('dashboard', DashController::class);
Route::resource('barang',BarangController::class);
Route::resource('pembelian',PembelianController::class);
Route::resource('penjualan',PenjualanController::class);

