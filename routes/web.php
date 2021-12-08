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
Route::get('/', [User_Controller_A::class, 'dashboard']);

// Dokter Route
Route::get('/dokter', [Dokter_Controller_A::class, 'get_all']);

// Ruang Route
Route::get('/ruang', [Ruang_Controller_A::class, 'get_all']);

// Auth
Route::get('/login', [Auth_Controller::class, 'login']);
