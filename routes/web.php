<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KecController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\PenerimaanController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

 Route::get('/',[DashboardController::class,'index']);
 Route::get('/penerimaan',[PenerimaanController::class,'index']);
 Route::get('/kecamatan',[KecamatanController::class,'index']);
 Route::get('/kelurahan',[KelurahanController::class,'index']);
// Route::get('/dhkp',[DHKPController::class,'index']);
// Route::get('/piutang',[PiutangController::class,'index']);
// Route::get('/realisasi',[RealisasiController::class,'index']);

//---------- Report----------
Route::get('/range','ReportController@daterange')->name('cari');
Route::get('/report',[ReportController::class,'index']);