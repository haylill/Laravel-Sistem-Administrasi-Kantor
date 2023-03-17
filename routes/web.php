<?php

use App\Http\Controllers\AbsensiController;
use Illuminate\Support\Facades\Route;
use Whoops\Run;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashController;
use App\Http\Controllers\UserController;
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

// proses regist in page users
Route::post('/registeruser',[AuthController::class, 'registeruser']);

//proses Login
Route::post('/prosesLogin',[AuthController::class, 'prosesLogin']);

//proses logout
Route::post('/logout', [AuthController::class, 'logout']);

//absent view
Route::get('/absent', [AbsensiController::class, 'index']);

//proses absent 
Route::post('/absensi', [AbsensiController::class, 'create']);

// users view
Route::get('/users', [UserController::class, 'index']);