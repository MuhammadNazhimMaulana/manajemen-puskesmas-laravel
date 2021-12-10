<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{Dokter_Controller_A, Ruang_Controller_A, User_Controller_A};
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
Route::get('/dokter', [Dokter_Controller_A::class, 'get_all']);

// Ruang Route
Route::prefix('/ruang')->group(function () {
    Route::get('/', [Ruang_Controller_A::class, 'get_all']);
    Route::get('/create', [Ruang_Controller_A::class, 'create_ruang']);
    Route::post('/create', [Ruang_Controller_A::class, 'store_ruang']);
    Route::delete('/delete/{id}', [Ruang_Controller_A::class, 'delete_ruang']);
});

// Auth
Route::get('/login', [Auth_Controller::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [Auth_Controller::class, 'authLogin']);
Route::post('/logout', [Auth_Controller::class, 'logout']);
Route::get('/register', [Auth_Controller::class, 'register'])->middleware('guest');
Route::post('/register', [Auth_Controller::class, 'storeRegister']);
