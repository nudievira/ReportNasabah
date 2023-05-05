<?php

use App\Http\Controllers\dataNasabahController;
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

Route::controller(dataNasabahController::class)->prefix('/dataNasabah')->group(function(){
    Route::get('/index','index')->name('dataNasabah-index');
    Route::get('/datatables', 'dataTables')->name('dataNasabah-datatables');
    Route::post('/tambah', 'addNasabah')->name('add-Nasabah');
    Route::post('/transaksi', 'addTransaksi')->name('transaksi-Nasabah');
    Route::get('/viewpoint', 'viewPoint')->name('viewPoint-Nasabah');
    Route::get('/reportNasabah', 'reportNasabah')->name('reportNasabah-Nasabah');
});