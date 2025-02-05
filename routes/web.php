<?php

use App\Http\Controllers\UserPengaduankuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\LaporanMasukController;
use App\Http\Controllers\GenerateReportController;
use App\Http\Controllers\KategoriPengaduanController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function(){
    return view('pages.users.index');
});

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::resource('/masyarakat', MasyarakatController::class);
Route::resource('/pegawai', PegawaiController::class);
Route::resource('/kategori', KategoriPengaduanController::class);
Route::get('/laporanmasuk', [LaporanMasukController::class, 'index']);
Route::get('/laporanmasuk/detail/{id}', [LaporanMasukController::class, 'detail']);
Route::get('/generatereport', [GenerateReportController::class, 'index']);
Route::get('/generatereport/periode', [GenerateReportController::class, 'periode']);
Route::get('/generatereport/rekap', [GenerateReportController::class, 'rekap']);
Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/profile/detail', [ProfileController::class, 'detail']);
Route::get('/loginadmin', [LoginAdminController::class, 'index']);

Route::resource('/pengaduanku', UserPengaduankuController::class);
Route::get('profileuser', [UserProfileController::class, 'index']);

// Authentification Admin
Route::post('/authadmin', [LoginAdminController::class, 'authadmin']);