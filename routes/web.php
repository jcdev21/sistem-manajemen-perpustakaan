<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\UserController;
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

Route::get('/', [Dashboard::class, 'index'])->name('dashboard');

Route::controller(UserController::class)->prefix('pengguna')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('pengguna.index');
    Route::get('/create', [UserController::class, 'create'])->name('pengguna.create');
    Route::post('/store', [UserController::class, 'store'])->name('pengguna.store');
});

Route::resource('buku', BukuController::class);

Route::controller(PeminjamanController::class)->prefix('peminjaman')->group(function () {
    Route::get('/', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::post('/store', [PeminjamanController::class, 'store'])->name('peminjaman.store');
});

Route::controller(PengembalianController::class)->prefix('pengembalian')->group(function () {
    Route::get('/', [PengembalianController::class, 'index'])->name('pengembalian.index');
    Route::get('/create', [PengembalianController::class, 'create'])->name('pengembalian.create');
    Route::post('/store', [PengembalianController::class, 'store'])->name('pengembalian.store');
});
