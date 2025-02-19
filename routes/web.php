<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\LaporanMasukController;
use App\Http\Controllers\GenerateReportController;
use App\Http\Controllers\TanggapanController;
// use App\Http\Controllers\LoginMasyarakatController;
use App\Http\Controllers\UserPengaduankuController;
use App\Http\Controllers\KategoriPengaduanController;
use App\Http\Controllers\RegisterMasyarakatController;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\LoginPetugasController;

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

Route::get('/', function () {
    return view('pages.users.index');
});

// Routes for kategori pengaduan
Route::resource('/kategori', KategoriPengaduanController::class);

// // Routes for laporan masuk
// Route::get('/laporanmasuk', [LaporanMasukController::class, 'index'])->name('laporanmasuk');
// Route::get('/laporanmasuk/detail/{id}', [LaporanMasukController::class, 'detail'])->name('laporanmasuk.detail');
// Route::put('/laporanmasuk/{id}', [LaporanMasukController::class, 'updateStatus'])->name('laporanmasuk.updateStatus');

// Routes for generate report

// Routes for profile
// Route::prefix('admin')->middleware('auth')->group(function () {

// });

// // Login Admin Routes
// Route::get('/loginpetugas', [LoginPetugasController::class, 'index'])->name('loginpetugas');
// Route::get('/loginadmin', [LoginAdminController::class, 'index'])->name('loginadmin');
// Route::post('/authadmin', [LoginAdminController::class, 'authadmin']);
// Route::post('/logoutadmin', [LoginAdminController::class, 'logout'])->name('logoutadmin');

// // Routes untuk Login Masyarakat
// Route::get('/loginmasyarakat', [LoginMasyarakatController::class, 'index'])->name('loginmasyarakat');
// Route::post('/authmasyarakat', [LoginMasyarakatController::class, 'authmasyarakat']);
// Route::post('/logoutmasyarakat', [LoginMasyarakatController::class, 'logout'])->name('logoutmasyarakat');
// Route::middleware('auth')->get('/pengaduanku', [UserPengaduankuController::class, 'index'])->name('pengaduanku.index');

// // Rute untuk halaman profil
// Route::middleware('auth')->get('/profile', [UserProfileController::class, 'index'])->name('profile.index');
// Route::middleware('auth')->post('/profile/update', [UserProfileController::class, 'update'])->name('update.profile');

// Routes for Pengaduanku resource and profile for masyarakat
Route::middleware('auth')->group(function () {
    Route::resource('/pengaduanku', UserPengaduankuController::class);
    Route::get('/pengaduanku/create', [UserPengaduankuController::class, 'create'])->name('pengaduanku.create');
    Route::post('/pengaduanku', [UserPengaduankuController::class, 'store'])->name('pengaduanku.store');
});

// DataTable for Laporan
// Route::any('/dataTableLaporan', [LaporanMasukController::class, 'getDataLaporan']);

// Hapus route login lama dan ganti dengan yang baru
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');
Route::get('/registermasyarakat', [RegisterMasyarakatController::class, 'showRegisterForm'])->name('registermasyarakat');
Route::post('/registermasyarakat', [RegisterMasyarakatController::class, 'register'])->name('masyarakat.register');

// Route untuk Admin dan Petugas
Route::middleware(['auth', 'role:admin,petugas'])->group(function () {
    Route::post('/dataTableLaporan', [LaporanMasukController::class, 'getDataLaporan'])->name('dataTableLaporan');
    Route::get('/laporanmasuk', [LaporanMasukController::class, 'index'])->name('laporanmasuk');
    Route::get('/laporanmasuk/detail/{id}', [LaporanMasukController::class, 'detail'])->name('laporanmasuk.detail');
    Route::put('/laporanmasuk/{id}', [LaporanMasukController::class, 'updateStatus'])->name('laporanmasuk.updateStatus');
    Route::post('/tanggapan', [TanggapanController::class, 'store'])->name('tanggapan.store');
    Route::get('/admin/profile', [ProfileController::class, 'index'])->name('admin.profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/profile/update/{id}', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::put('/profile/update-password/{id}', [ProfileController::class, 'updatePassword'])->name('admin.profile.updatePassword');
    // Route::get('/generatereport', [GenerateReportController::class, 'index']);
    // Route::get('/generatereport/periode', [GenerateReportController::class, 'periode'])->name('generatereport.periode');
    // Route::get('/generatereport/rekap', [GenerateReportController::class, 'rekap']);
});

// Route khusus untuk Petugas
Route::middleware(['auth', 'role:petugas'])->group(function () {
    Route::get('/dashboardPetugas', [DashboardController::class, 'indexPetugas']);
    Route::resource('/masyarakat', MasyarakatController::class);
});

// Route khusus untuk Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/masyarakat', MasyarakatController::class);
    Route::resource('/kategori', KategoriPengaduanController::class);
    Route::resource('/pegawai', PegawaiController::class);
});

// Route untuk Masyarakat
Route::middleware(['auth', 'role:masyarakat'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home'); // Tambahkan ini
    Route::resource('/pengaduanku', UserPengaduankuController::class);
    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [UserProfileController::class, 'update'])->name('profile.update');
    Route::post('/password/update', [UserProfileController::class, 'updatePassword'])->name('update.password');
});
