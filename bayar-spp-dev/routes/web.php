<?php

use App\Http\Controllers\Admin\DasusController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\AdminController as DashboardAdminController;
use App\Http\Controllers\Dashboard\SiswaController as DashboardSiswaController;
use App\Http\Controllers\Dashboard\TatusController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/home', function () {
//     return view('home');
// });


Auth::routes();

// Logout auth
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Dashboard Users
Route::middleware('role:admin')->get('/dashboard/admin', [DashboardAdminController::class, 'index'])->name('dashboard/admin');
Route::middleware('role:tatus')->get('/dashboard/tatus', [TatusController::class, 'index'])->name('dashboard/tatus');
Route::middleware('role:user')->get('dashboard/siswa', [DashboardSiswaController::class, 'index'])->name('dashboard/siswa');

// Daftar Siswa Admin
Route::get('admin/daftar-siswa', [DasusController::class, 'index'])->name('admin/daftar-siswa');
Route::get('admin/create-siswa', [DasusController::class, 'create'])->name('admin/create-siswa');
Route::get('admin/store-siswa', [DasusController::class, 'store'])->name('admin/store-siswa');
