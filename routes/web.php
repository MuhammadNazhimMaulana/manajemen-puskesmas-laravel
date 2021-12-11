<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{Dokter_Controller_A, Ruang_Controller_A, User_Controller_A, Pendaftaran_Controller_A, Obat_Controller_A};
use App\Http\Controllers\Auth\Auth_Controller;


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

// Main Route
Route::get('/', [User_Controller_A::class, 'dashboard'])->middleware('auth');

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

// Ruang pendaftaran
Route::prefix('/pendaftaran')->group(function () {
    Route::get('/', [Pendaftaran_Controller_A::class, 'get_all']);
    Route::get('/create', [Pendaftaran_Controller_A::class, 'create_pendaftaran']);
    Route::post('/create', [Pendaftaran_Controller_A::class, 'store_pendaftaran']);
    Route::get('/update/{id}', [Pendaftaran_Controller_A::class, 'update_pendaftaran']);
    Route::put('/update/{id}', [Pendaftaran_Controller_A::class, 'update_pendaftaran_process']);
    Route::delete('/delete/{id}', [Pendaftaran_Controller_A::class, 'delete_pendaftaran']);
});

// Ruang obat
Route::prefix('/obat')->group(function () {
    Route::get('/', [Obat_Controller_A::class, 'get_all']);
    Route::get('/create', [Obat_Controller_A::class, 'create_obat']);
    Route::post('/create', [Obat_Controller_A::class, 'store_obat']);
    Route::get('/update/{id}', [Obat_Controller_A::class, 'update_obat']);
    Route::put('/update/{id}', [Obat_Controller_A::class, 'update_obat_process']);
    Route::delete('/delete/{id}', [Obat_Controller_A::class, 'delete_obat']);
});

// Auth
Route::get('/login', [Auth_Controller::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [Auth_Controller::class, 'authLogin']);
Route::post('/logout', [Auth_Controller::class, 'logout']);
Route::get('/register', [Auth_Controller::class, 'register'])->middleware('guest');
Route::post('/register', [Auth_Controller::class, 'storeRegister']);
