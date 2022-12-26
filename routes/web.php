<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsenController;
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


Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('authenticate', [LoginController::class, 'authenticate']);

// Route::group(['middleware' => 'auth'], function () {
Route::resource('/', HomeController::class);
Route::resource('absen', AbsenController::class);
Route::resource('users', UserController::class);

Route::post('savefingerimage', [AbsenController::class, 'savefingerimage' ]);
// });
