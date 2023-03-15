<?php

use Illuminate\Support\Facades\Route;
use Whoops\Run;
use App\Http\Controllers\AuthController;
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

Route::get('/', function () {

    // get nik from session
    $nik = session()->get('user');
    // get data user from nik
    $user = User::where('nik', $nik)->first();
    dd($nik);
    if(auth()->user()){
        return redirect('/login');
        return view('welcome');
    }else{
    }
    
});
//dashboard view
// Route::get('/',);

//login  view
Route::get('/login', [AuthController::class, 'login']);

//regist view
Route::get('/regist', [AuthController::class, 'regist']);

// proses regist
Route::post('/register',[AuthController::class, 'register']);

//proses Login
Route::post('/prosesLogin',[AuthController::class, 'prosesLogin']);