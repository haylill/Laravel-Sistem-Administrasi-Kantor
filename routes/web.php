<?php


use Illuminate\Support\Facades\Route;
use Whoops\Run;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GajiController;

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

// //regist view
// Route::get('/regist', [AuthController::class, 'regist']);

//forget password view
Route::get('/forget-password',[AuthController::class,'forgetpassword']);

//forget password PROSES
Route::post('/prosesforget',[AuthController::class,'forgetproses']);

//proses reset password view
Route::get('/reset/{email}/{token}',[AuthController::class,'resetpass']);

//proses prosesreset
Route::post('/prosesreset',[AuthController::class,'prosesreset']);

// // proses regist
// Route::post('/register',[AuthController::class, 'register']);

//proses Login
Route::post('/prosesLogin',[AuthController::class, 'prosesLogin']);

//proses logout
Route::post('/logout', [AuthController::class, 'logout']);

//absent view
Route::get('/absent', [AbsensiController::class, 'index']);

//proses absent 
Route::post('/absensi', [AbsensiController::class, 'create']);

//view /management-absent 
Route::get('/management-absent',[AbsensiController::class, 'absentmanagement']);

//proses /export-absent
Route::post('/export-absent' , [AbsensiController::class, 'exportabsent']);

// users view
Route::get('/users', [UserController::class, 'index']);

//delete users
Route::delete('/userdelete/{id}', [UserController::class, 'delete']);

// edit user
Route::post('/edituserutama', [UserController::class, 'edituser']);

// proses regist in page users
Route::post('/registeruser',[UserController::class, 'registeruser']);

// proses update in page users
Route::put('/userupdate',[UserController::class, 'updateuser']);

//view salary users
Route::get('/salary-users', [GajiController::class,'index']);

// proses update in page salary
Route::put('/salaryupdate',[GajiController::class, 'updatesalary']);

//view /salary-management
Route::get('/salary-management', [GajiController::class,'salarymanagement']);

//proses /export-salary
Route::post('/export-salary' ,[GajiController::class, 'exportsalary']);

// view in-mail
Route::get('/in-mail', [ArsipController::class, 'inmail']);

// add in-mail
Route::post('/addmail' , [ArsipController::class, 'addmail']);

//update in-mail
Route::put('inmailup', [ArsipController::class, 'updateinmail']);

//delet in-mail
Route::delete('/inmaildelete/{id}', [ArsipController::class, 'deleteinmail']);

//download file in out mail
Route::get('/downloadfile/{file}', [ArsipController::class, 'download']);


// view out-mail
Route::get('/out-mail', [ArsipController::class, 'outmail']);


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

// if no route found
Route::fallback(function () {return view('auth.notfound', ['title' => '404 | Office Administration' , 'url_base' => url('/')]);});


