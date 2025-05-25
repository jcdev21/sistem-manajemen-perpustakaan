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

Route::get('/', function () {
    dd('hey');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false
]);

Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

Route::get('/user', [User::class, 'index'])->name('user');
Route::get('/user-clientside', [User::class, 'clientside'])->name('user.clientside');
Route::get('/user/create', [User::class, 'create'])->name('user.create');
Route::get('/user/{user}/edit', [User::class, 'edit'])->name('user.edit');