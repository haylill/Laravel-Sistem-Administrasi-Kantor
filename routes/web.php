<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\InventarisController;
use Illuminate\Support\Facades\Route;
use Whoops\Run;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashController;
use App\Http\Controllers\TamuController;
use App\Models\User;
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

//dashboard view
Route::get('/', [dashController::class,'index']);

//login  view
Route::get('/login', [AuthController::class, 'login']);

//regist view
Route::get('/regist', [AuthController::class, 'regist']);

// proses regist
Route::post('/register',[AuthController::class, 'register']);

//proses Login
Route::post('/prosesLogin',[AuthController::class, 'prosesLogin']);

//proses logout
Route::post('/logout', [AuthController::class, 'logout']);

//absent view
Route::get('/absent', [AbsensiController::class, 'index']);

//proses absent 
Route::post('/absensi', [AbsensiController::class, 'create']);

//inventaris view
Route::get('/inventaris', [InventarisController::class, 'index'])->name('inventaris'); //halaman inventaris
Route::post('/input', [InventarisController::class, 'input'])->name('input'); //simpan data inventaris
Route::get('/hapus/{id}', [InventarisController::class, 'hapus'])->name('hapus'); //hapus data inventaris
Route::post('/update/{id}', [InventarisController::class, 'update'])->name('update'); //update data inventaris
Route::get('/show/{id}', [InventarisController::class, 'show'])->name('show'); //menampilkan data update inventaris

//guest view
Route::get('/tamu', [TamuController::class, 'index'])->name('tamu'); //halaman tamu
Route::post('/input', [TamuController::class, 'input'])->name('input'); //simpan data tamu
Route::get('/guest', [TamuController::class, 'show'])->name('guest'); //halaman guest
