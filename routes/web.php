<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{Penilaian_Controller_A,LaporanPengunjung_Controller_A, KeranjangObat_Controller_A, PembelianObat_Controller_A, Dokter_Controller_A, Ruang_Controller_A, User_Controller_A, Pendaftaran_Controller_A, Obat_Controller_A, Pasien_Controller_A, Transaksi_Controller_A};
use App\Http\Controllers\Auth\{Auth_Controller_U, Auth_Controller};
use App\Http\Controllers\User\{Penilaian_Controller_U, KeranjangObat_Controller_U, PembelianObat_Controller_U, Transaksi_Controller_U, Dokter_Controller_U, User_Controller_U, Utama_Controller_U, Pendaftaran_Controller_U, Obat_Controller_U, Ruang_Controller_U, Pasien_Controller_U};

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

// Route User
Route::middleware('guest')->group(function () {
    Route::get('/login_user', [Auth_Controller_U::class, 'login']);
    Route::post('/login_user', [Auth_Controller_U::class, 'authLogin']);
    Route::get('/register_user', [Auth_Controller_U::class, 'register']);
    Route::post('/register_user', [Auth_Controller_U::class, 'storeRegister']);
    Route::get('/dashboard_user', [Utama_Controller_U::class, 'main']);

    // Lupa password User
    Route::get('/forgetPass_user', [Auth_Controller_U::class, 'forget_view']);
    Route::post('/forgetPass_user', [Auth_Controller_U::class, 'forget_pass']);
});

Route::middleware('user_ver')->group(function () {

    // Route personal user
    Route::get('/profile', [User_Controller_U::class, 'profile']);
    Route::get('/profile_ubah', [User_Controller_U::class, 'ubah_profile']);
    Route::put('/profil_ubah', [User_Controller_U::class, 'proses_ubah']);

    // Pendaftaran User Route
    Route::prefix('/pendaftaran_user')->group(function () {
        Route::get('/', [Pendaftaran_Controller_U::class, 'get_all']);
        Route::get('/create/{spesialis}', [Pendaftaran_Controller_U::class, 'get_dokter']);
        Route::get('/create', [Pendaftaran_Controller_U::class, 'create_pendaftaran_user']);
        Route::post('/create', [Pendaftaran_Controller_U::class, 'store_pendaftaran_user']);
    });

    // Route dokter user
    Route::prefix('/dokter_user')->group(function () {
        Route::get('/', [Dokter_Controller_U::class, 'get_all']);
    });

    // Transaksi Pemeblian Obat User Route
    Route::prefix('/pembelian_user')->group(function () {
        Route::get('/', [PembelianObat_Controller_U::class, 'get_all']);
        Route::get('/{id}', [PembelianObat_Controller_U::class, 'view_pembelian']);
        Route::post('/create', [PembelianObat_Controller_U::class, 'store_pembelian_user']);
        Route::get('/payment/{id}', [PembelianObat_Controller_U::class, 'payment_view']);
        Route::post('/payment/{id}', [PembelianObat_Controller_U::class, 'payment']);
        Route::put('/payment/{id}', [PembelianObat_Controller_U::class, 'payment_process']);
        Route::get('/pembayaran_obat/{id}', [PembelianObat_Controller_U::class, 'pembayaran_obat']);
        Route::get('/pdf/{id}', [PembelianObat_Controller_U::class, 'pdf_pembelian']);
    });

    // Keranjang Pemeblian Obat User Route
    Route::prefix('/keranjang-obat-user')->group(function () {
        Route::get('/', [KeranjangObat_Controller_U::class, 'keranjang_view']);
        Route::get('/{id_pembelian}', [KeranjangObat_Controller_U::class, 'keranjang_pembelian']);
        Route::post('/create', [KeranjangObat_Controller_U::class, 'add_keranjang']);
        Route::put('/update/{id}', [KeranjangObat_Controller_U::class, 'update_keranjang']);
        Route::delete('/delete/{id}', [KeranjangObat_Controller_U::class, 'delete_keranjang']);
    });

    // Transaksi Route User
    Route::prefix('/transaksi_user')->group(function () {
        Route::get('/', [Transaksi_Controller_U::class, 'get_all']);
        Route::get('/{id}', [Transaksi_Controller_U::class, 'view_transaksi']);
        Route::get('/pembayaran/{id}', [Transaksi_Controller_U::class, 'pembayaran_transaksi']);
        Route::get('/pdf/{id}', [Transaksi_Controller_U::class, 'pdf_transaksi']);
    });

    // Ruang Route
    Route::prefix('/ruang_user')->group(function () {
        Route::get('/', [Ruang_Controller_U::class, 'get_all']);
    });

    // Penilaian Route
    Route::prefix('/penilaian')->group(function () {
        Route::post('/', [Penilaian_Controller_U::class, 'add_penilaian']);
    });

    // Pasien Route
    Route::prefix('/obat_user')->group(function () {
        Route::get('/', [Obat_Controller_U::class, 'get_all']);
    });

    // Pasien Route
    Route::prefix('/pasien_user')->group(function () {
        Route::get('/', [Pasien_Controller_U::class, 'get_all']);
        Route::get('/{id}', [Pasien_Controller_U::class, 'view_pasien']);
    });

    // Main Route User
    Route::post('/logout_user', [Auth_Controller_U::class, 'logout']);
    Route::get('/', [User_Controller_U::class, 'dashboard']);
});


// Give middleware Admin
Route::middleware('admin')->group(function () {

    // Main Route Admin
    Route::get('/dashboard', [User_Controller_A::class, 'dashboard']);

    // Penialaian Route
    Route::prefix('/penilaian')->group(function () {
        Route::get('/', [Penilaian_Controller_A::class, 'get_all']);
    });

    // Dokter Route
    Route::prefix('/dokter')->group(function () {
        Route::get('/', [Dokter_Controller_A::class, 'get_all']);
        Route::get('/create', [Dokter_Controller_A::class, 'create_dokter']);
        Route::post('/create', [Dokter_Controller_A::class, 'store_dokter']);
        Route::get('/update/{id}', [Dokter_Controller_A::class, 'update_dokter']);
        Route::put('/update/{id}', [Dokter_Controller_A::class, 'update_dokter_process']);
        Route::delete('/delete/{id}', [Dokter_Controller_A::class, 'delete_dokter']);
    });

    // Ruang Route
    Route::prefix('/ruang')->group(function () {
        Route::get('/', [Ruang_Controller_A::class, 'get_all']);
        Route::get('/create', [Ruang_Controller_A::class, 'create_ruang']);
        Route::post('/create', [Ruang_Controller_A::class, 'store_ruang']);
        Route::get('/update/{id}', [Ruang_Controller_A::class, 'update_ruang']);
        Route::put('/update/{id}', [Ruang_Controller_A::class, 'update_ruang_process']);
        Route::delete('/delete/{id}', [Ruang_Controller_A::class, 'delete_ruang']);
    });

    // Pendaftaran Route
    Route::prefix('/pendaftaran')->group(function () {
        Route::get('/', [Pendaftaran_Controller_A::class, 'get_all']);
        Route::get('/create', [Pendaftaran_Controller_A::class, 'create_pendaftaran']);
        Route::post('/create', [Pendaftaran_Controller_A::class, 'store_pendaftaran']);
        Route::get('/update/{id}', [Pendaftaran_Controller_A::class, 'update_pendaftaran']);
        Route::put('/update/{id}', [Pendaftaran_Controller_A::class, 'update_pendaftaran_process']);
        Route::delete('/delete/{id}', [Pendaftaran_Controller_A::class, 'delete_pendaftaran']);
    });

    // Obat Route
    Route::prefix('/obat')->group(function () {
        Route::get('/', [Obat_Controller_A::class, 'get_all']);
        Route::get('/get_harga', [Obat_Controller_A::class, 'action']);
        Route::get('/create', [Obat_Controller_A::class, 'create_obat']);
        Route::post('/create', [Obat_Controller_A::class, 'store_obat']);
        Route::get('/update/{id}', [Obat_Controller_A::class, 'update_obat']);
        Route::put('/update/{id}', [Obat_Controller_A::class, 'update_obat_process']);
        Route::delete('/delete/{id}', [Obat_Controller_A::class, 'delete_obat']);
    });

    // Pasien Route
    Route::prefix('/pasien')->group(function () {
        Route::get('/', [Pasien_Controller_A::class, 'get_all']);
        Route::get('/create', [Pasien_Controller_A::class, 'create_pasien']);
        Route::post('/create', [Pasien_Controller_A::class, 'store_pasien']);
        Route::get('/update/{id}', [Pasien_Controller_A::class, 'update_pasien']);
        Route::put('/update/{id}', [Pasien_Controller_A::class, 'update_pasien_process']);
        Route::delete('/delete/{id}', [Pasien_Controller_A::class, 'delete_pasien']);
    });

    // Transaksi Route
    Route::prefix('/transaksi')->group(function () {
        Route::get('/', [Transaksi_Controller_A::class, 'get_all']);
        Route::get('/create', [Transaksi_Controller_A::class, 'create_transaksi']);
        Route::post('/create', [Transaksi_Controller_A::class, 'store_transaksi']);
        Route::get('/update/{id}', [Transaksi_Controller_A::class, 'update_transaksi']);
        Route::put('/update/{id}', [Transaksi_Controller_A::class, 'update_transaksi_process']);
        Route::delete('/delete/{id}', [Transaksi_Controller_A::class, 'delete_transaksi']);
    });

    // Transaksi Pemeblian Obat Route
    Route::prefix('/pembelian')->group(function () {
        Route::get('/', [PembelianObat_Controller_A::class, 'get_all']);
        Route::post('/create', [PembelianObat_Controller_A::class, 'store_pembelian']);
        Route::get('/payment/{id}', [PembelianObat_Controller_A::class, 'payment_view']);
        Route::post('/payment/{id}', [PembelianObat_Controller_A::class, 'payment']);
        Route::put('/payment/{id}', [PembelianObat_Controller_A::class, 'payment_process']);
        Route::delete('/delete/{id}', [PembelianObat_Controller_A::class, 'delete_pembelian']);
    });

    // Keranjang Pemeblian Obat Route
    Route::prefix('/keranjang-obat')->group(function () {
        Route::get('/', [KeranjangObat_Controller_A::class, 'keranjang_view']);
        Route::get('/{id_pembelian}', [KeranjangObat_Controller_A::class, 'keranjang_pembelian']);
        Route::post('/create', [KeranjangObat_Controller_A::class, 'add_keranjang']);
        Route::put('/update/{id}', [KeranjangObat_Controller_A::class, 'update_keranjang']);
        Route::delete('/delete/{id}', [KeranjangObat_Controller_A::class, 'delete_keranjang']);
    });

    // Laporan Pengunjung Route
    Route::prefix('/laporan')->group(function () {
        Route::get('/', [LaporanPengunjung_Controller_A::class, 'get_all']);
        Route::get('/create', [LaporanPengunjung_Controller_A::class, 'create_laporan']);
        Route::post('/create', [LaporanPengunjung_Controller_A::class, 'store_laporan']);
        Route::get('/pdf/{id}', [LaporanPengunjung_Controller_A::class, 'pdf_laporan']);
        Route::get('/update/{id}', [LaporanPengunjung_Controller_A::class, 'update_laporan']);
        Route::put('/update/{id}', [LaporanPengunjung_Controller_A::class, 'update_laporan_process']);
        Route::delete('/delete/{id}', [LaporanPengunjung_Controller_A::class, 'delete_laporan']);
    });

    // Auth Admin
    Route::prefix('/admin')->group(function () {
        Route::get('/profile', [User_Controller_A::class, 'profile']);
        Route::get('/ubah_profile', [User_Controller_A::class, 'ubah_profile']);
        Route::put('/ubah_profil', [User_Controller_A::class, 'proses_ubah']);
        Route::post('/logout', [Auth_Controller::class, 'logout']);
    });
});


// Auth Admin
Route::middleware('guest')->prefix('/admin')->group(function () {
    Route::get('/login', [Auth_Controller::class, 'login'])->name('login');
    Route::post('/login', [Auth_Controller::class, 'authLogin']);
    Route::get('/register', [Auth_Controller::class, 'register']);
    Route::post('/register', [Auth_Controller::class, 'storeRegister']);

    // Lupa password Admin
    Route::get('/forgetPass_admin', [Auth_Controller::class, 'forget_view']);
    Route::post('/forgetPass_admin', [Auth_Controller::class, 'forget_pass']);
});
