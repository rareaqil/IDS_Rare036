<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_customer;
use App\Http\Controllers\C_user;
use App\Http\Controllers\C_barang;
use App\Http\Controllers\C_toko;
use App\Http\Controllers\C_pengguna;
use App\Http\Controllers\C_scoreBoard;

use App\Http\Controllers\GoogleController;

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
    return redirect()->route('login');
});


// Route::get('/',[C_user::class,'welcome']);

//Minggu 1

Route::get('/customer',[C_customer::class,'indexCustomer']);
Route::post('/insertcustomer_v1',[C_customer::class,'insertCustomerV1']);
Route::get('/customer_v1',[C_customer::class,'customerV1']);
Route::post('/insertcustomer_v2',[C_customer::class,'insertcustomerV2']);
Route::get('/customer_v2',[C_customer::class,'customerV2']);
// Ajax Form Kota
Route::get('/findKota', [C_customer::class, 'findKota'])->name('findKota');
Route::get('/findKecamatan', [C_customer::class, 'findKecamatan'])->name('findKecamatan');
Route::get('/findKelurahan', [C_customer::class, 'findKelurahan'])->name('findKelurahan');
Route::get('/findKodepos', [C_customer::class, 'findKodepos'])->name('findKodepos');


//Minggu 2
Route::get('/barcode',[C_barang::class,'indexBarang']);
Route::get('/barcode/cetak_pdf',[C_barang::class,'cetakPdf']);
Route::post('/barcode/cetak_pdf',[C_barang::class,'cetakPdf']);
Route::get('/barcode/cetak_pdf1',[C_barang::class,'cetakPdf1']);
Route::post('/barcode/cetak_pdf1',[C_barang::class,'cetakPdf1']);
// Test Cetk Pilih Barcode
Route::post('/barcode/cetak_pdf2',[C_barang::class,'cetakPdf2'])->name('barcode.print_pdf');
//Scan Barcode
Route::get('/scan',[C_barang::class,'scan']);
Route::get('/findBarang',[C_barang::class,'findBarang'])->name('findBarang');

// Route::get('/scan', function () {
    //         return view('minggu_2/scan_barcode');
    //     });
    
    
//Minggu 3
Route::get('/toko',[C_toko::class,'indexToko']);   
Route::post('/tambahToko',[C_toko::class,'tambahToko']);   
Route::get('/tambahToko',[C_toko::class,'tambahToko']);   
Route::post('/insertToko',[C_toko::class,'insertToko']);   
Route::get('/tambahKunjungan',[C_toko::class,'tambahKunjungan']);   
Route::post('/tambahKunjungan',[C_toko::class,'tambahKunjungan']);   

Route::get('/findToko',[C_toko::class,'findToko'])->name('findToko');

// //Minggu 9
// Route::get('/pengguna', [C_pengguna::class, 'indexCustomer']);
// Route::get('/customerExport', [C_pengguna::class, 'customerExport'])->name('customerExport');
// Route::post('/customerImport', [C_pengguna::class, 'customerImport'])->name('customerImport');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $data = array(
        'menu' =>'home',
        'submenu' => '',
    );
    return view('dashboard',$data);
})->name('dashboard');


//Login Auth
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


//Minggu 6
Route::get('/scoreboard/controller',[C_scoreBoard::class, 'controller']);
Route::get('/scoreboard/client', [C_scoreBoard::class, 'client']);

Route::get('/scoreboard/client/sse', [C_scoreBoard::class, 'sse_team']);

Route::get('/scoreboard/controller/sse/resetscore', [C_scoreBoard::class, 'sse_reset_score']);
Route::get('/scoreboard/controller/sse/reset', [C_scoreBoard::class, 'sse_reset']);
Route::post('/scoreboard/controller/sse/team', [C_scoreBoard::class, 'sse_team_server']);

Route::post('/scoreboard/controller/sse/game_ball', [C_scoreBoard::class, 'sse_game_ball']);

Route::post('/scoreboard/controller/sse/home/score', [C_scoreBoard::class, 'sse_home_score']);
Route::post('/scoreboard/controller/sse/away/score', [C_scoreBoard::class, 'sse_away_score']);

Route::post('/scoreboard/controller/sse/home/scoremain', [C_scoreBoard::class, 'sse_main_home_score']);
Route::post('/scoreboard/controller/sse/away/scoremain', [C_scoreBoard::class, 'sse_main_away_score']);

Route::post('/scoreboard/controller/sse/timer', [C_scoreBoard::class, 'sse_timer']);
Route::post('/scoreboard/controller/sse/audio', [C_scoreBoard::class, 'sse_audio']);

Route::get('/excel', [C_pengguna::class, 'index']);
Route::get('/customerExport', [C_pengguna::class, 'customerExport'])->name('customerExport');
Route::post('/customerImport', [C_pengguna::class, 'customerImport'])->name('customerImport');

// Scoreboard
// Route::get('/scoreboard', 'App\Http\Controllers\C_scoreBoard@scoreboard_index');
// Route::get('/scoreboard-controller', 'App\Http\Controllers\C_scoreBoard@controller_index');
// Route::post('/scoreboard-controller/update', 'App\Http\Controllers\C_scoreBoard@controller_store');

// Route::get('/messages', 'App\Http\Controllers\C_scoreBoard@message');