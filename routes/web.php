<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Back\PendaftarController;
use App\Http\Controllers\Front\BerandaController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', [BerandaController::class, 'beranda'])->name('Beranda');

Route::middleware(['guest'])->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'halaman_login')->name('HalamanLogin');
        Route::post('/proses-login', 'proses_login')->name('ProsesLogin');
    });

    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'halaman_register')->name('HalamanRegister');
        Route::post('/proses-register', 'proses_register')->name('ProsesRegister');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/proses-logout', [AuthController::class, 'proses_logout'])->name('ProsesLogout');
    Route::prefix('admin')->middleware(['isAdmin'])->group(function () {
        Route::controller(PendaftarController::class)->group(function () {
            Route::get('pendaftar', 'pendaftar')->name('admin.HalamanPendaftar');
            Route::any('data-pendaftar/{jenis}', 'data_pendaftar')->name('admin.DataPendaftar');
            Route::get('konfirmasi-pengguna/{id}/{tipe}', 'konfirmasi_pengguna');
        });
    });
});
