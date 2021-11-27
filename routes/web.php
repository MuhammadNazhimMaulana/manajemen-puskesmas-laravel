<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dokter_Controller_A;


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
    return view('welcome');
});

// Dokter Route
Route::get('/dokter', [Dokter_Controller_A::class, 'get_all']);
