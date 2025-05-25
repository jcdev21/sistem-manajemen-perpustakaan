<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
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

Route::controller(User::class)->prefix('pengguna')->group(function () {
    Route::get('/', [User::class, 'index'])->name('pengguna.index');
    Route::get('/create', [User::class, 'create'])->name('pengguna.create');
    Route::post('/store', [User::class, 'store'])->name('pengguna.store');
});
