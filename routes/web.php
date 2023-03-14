<?php

use Illuminate\Support\Facades\Route;
use Whoops\Run;
use App\Http\Controllers\AuthController;
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

//login  view
Route::get('/login', [AuthController::class, 'login']);

//regist view
Route::get('/regist', [AuthController::class, 'regist']);