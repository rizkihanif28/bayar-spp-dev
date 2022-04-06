<?php

use App\Http\Controllers\Admin\DasusController;
use App\Http\Controllers\admin\DetyarController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\admin\PemsisController;
use App\Http\Controllers\Admin\PeriodeController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\UserContoller;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\AdminController as DashboardAdminController;
use App\Http\Controllers\Dashboard\SiswaController as DashboardSiswaController;
use App\Http\Controllers\Dashboard\TatusController;
use App\Http\Controllers\Tatus\DasisController;
use App\Http\Controllers\Tatus\PembayaranController;
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


Route::middleware(['auth:web'])->group(function () {
    Route::get('/', [DashboardAdminController::class, 'index'])->name('web.index');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

    // Dashboard Users
    Route::middleware('role:admin')->get('dashboard/admin', [DashboardAdminController::class, 'index'])->name('dashboard/admin');
    Route::middleware('role:tatus')->get('dashboard/tatus', [TatusController::class, 'index'])->name('dashboard/tatus');
    Route::middleware('role:user')->get('dashboard/siswa', [DashboardSiswaController::class, 'index'])->name('dashboard/siswa');

    // Pengguna / Users
    Route::get('admins/users/index', [UserContoller::class, 'index'])->name('admins/users/index');
    Route::get('admins/users/create', [UserContoller::class, 'create'])->name('admins/users/create');
    Route::post('admins/users/store', [UserContoller::class, 'store'])->name('admins/users/store');
    Route::get('admins/users/edit', [UserContoller::class, 'edit'])->name('admins/users/edit');
    Route::post('admins/users/update', [UserContoller::class, 'update'])->name('admins/users/update');
    Route::post('admins/users/destroy', [UserContoller::class, 'destroy'])->name('admins/users/destroy');

    // siswa
    Route::get('admins/siswa/index', [SiswaController::class, 'index'])->name('admins/siswa/index');
    Route::get('admins/siswa/create', [SiswaController::class, 'create'])->name('admins/siswa/create');
    Route::post('admins/siswa/store', [SiswaController::class, 'store'])->name('admins/siswa/store');
    Route::get('admins/siswa/edit', [SiswaController::class, 'edit'])->name('admins/siswa/edit');
    Route::post('admins/siswa/update', [SiswaController::class, 'update'])->name('admins/siswa/update');
    Route::post('admins/siswa/destroy', [SiswaController::class, 'destroy'])->name('admins/siswa/destroy');

    // jurusan
    Route::get('admins/jurusan/index', [JurusanController::class, 'index'])->name('admins/jurusan/index');
    Route::get('admins/jurusan/create', [JurusanController::class, 'create'])->name('admins/jurusan/create');
    Route::post('admins/jurusan/store', [JurusanController::class, 'store'])->name('admins/jurusan/store');
    Route::get('admins/jurusan/{jurusan}/edit', [JurusanController::class, 'edit'])->name('admins/jurusan/edit');
    Route::post('admins/jurusan/{jurusan}/update', [JurusanController::class, 'update'])->name('admins/jurusan/update');
    Route::post('admins/jurusan/{jurusan}/destroy', [JurusanController::class, 'destroy'])->name('admins/jurusan/destroy');

    // periode
    Route::get('admins/periode/index', [PeriodeController::class, 'index'])->name('admins/periode/index');
    Route::get('admins/periode/create', [PeriodeController::class, 'create'])->name('admins/periode/create');
    Route::post('admins/periode/store', [PeriodeController::class, 'store'])->name('admins/periode/store');
    Route::get('admins/periode/{periode}/edit', [PeriodeController::class, 'edit'])->name('admins/periode/edit');
    Route::post('admins/periode/{periode}/update', [PeriodeController::class, 'update'])->name('admins/periode/update');
    Route::post('admins/periode/{periode}/destroy', [PeriodeController::class, 'destroy'])->name('admins/periode/destroy');

    // kelas
    Route::get('admins/kelas/index', [KelasController::class, 'index'])->name('admins/kelas/index');
    Route::get('admins/kelas/create', [KelasController::class, 'create'])->name('admins/kelas/create');
    Route::post('admins/kelas/store', [KelasController::class, 'store'])->name('admins/kelas/store');
    Route::get('admins/kelas/{kelas}/edit', [KelasController::class, 'edit'])->name('admins/kelas/edit');
    Route::post('admins/kelas/{kelas}/update', [KelasController::class, 'update'])->name('admins/kelas/update');
    Route::post('admins/kelas/{kelas}/destroy', [KelasController::class, 'destroy'])->name('admins/kelas/destroy');
});


// Daftar Siswa Admin
    // Route::get('admin/daftar-siswa', [DasusController::class, 'index'])->name('admin/daftar-siswa');
    // Route::post('admin/store-siswa', [DasusController::class, 'store'])->name('admin/store-siswa');
    // Route::post('admin/edits-siswa', [DasusController::class, 'edits'])->name('admin/edits-siswa');
    // Route::post('admin/updates-siswa', [DasusController::class, 'updates'])->name('admin/updates-siswa');
    // Route::post('admin/destroy-siswa', [DasusController::class, 'destroy'])->name('admin/destroy-siswa');

// Daftar Siswa Tatus
// Route::get('tatus/daftar-siswa', [DasisController::class, 'index'])->name('tatus/daftar-siswa');
// Route::post('tatus/store-siswa', [DasisController::class, 'store'])->name('tatus/store-siswa');
// Route::post('tatus/edits-siswa', [DasisController::class, 'edits'])->name('tatus/edits-siswa');
// Route::post('tatus/updates-siswa', [DasisController::class, 'updates'])->name('tatus/updates-siswa');
// Route::post('tatus/destroy-siswa', [DasisController::class, 'destroy'])->name('tatus/destroy-siswa');

// Pembayaran Siswa Admin
// Route::get('admin/pembayaran-search', [PemsisController::class, 'index'])->name('admin/pembayaran-search');
// Route::get('admin/detail-pembayaran', [DetyarController::class, 'index'])->name('admin/detail-pembayaran');

// Pembayaran siswa tatus
// Route::get('tatus/pembayaran/index', [PembayaranController::class, 'index'])->name('tatus/pembayaran/index');
