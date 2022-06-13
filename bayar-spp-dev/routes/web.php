<?php

use App\Http\Controllers\Admin\DataBayarController;
use App\Http\Controllers\Admin\HistoriController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\Laporan;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\PembayaranController as AdminPembayaranController;
use App\Http\Controllers\Admin\PeriodeController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\TagihanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\AdminController as DashboardAdminController;
use App\Http\Controllers\Dashboard\SiswaController as DashboardSiswaController;
use App\Http\Controllers\Dashboard\TatusController;
use App\Http\Controllers\Tatus\ProfilController;
use App\Http\Controllers\Tatus\SiswaController as TatusSiswaController;
use App\Models\User;
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

    Route::get('register/create', [RegisterController::class, 'create']);
    Route::post('register/store', [RegisterController::class, 'store']);

    // Dashboard Users
    Route::middleware('role:admin')->get('dashboard/admin', [DashboardAdminController::class, 'index'])->name('dashboard/admin');
    Route::middleware('role:tata usaha')->get('dashboard/tatus', [TatusController::class, 'index'])->name('dashboard/tatus');
    Route::middleware('role:siswa')->get('dashboard/siswa', [DashboardSiswaController::class, 'index'])->name('dashboard/siswa');

    // {{ Route Admin }}
    // Pengguna / Users
    Route::get('admins/user/index', [UserController::class, 'index'])->name('admins/user/index');
    Route::get('admins/user/create', [UserController::class, 'create'])->name('admins/user/create');
    Route::post('admins/user/store', [UserController::class, 'store'])->name('admins/user/store');
    Route::get('admins/user/{user}/edit', [UserController::class, 'edit'])->name('admins/user/edit');
    Route::post('admins/user/{user}/update', [UserController::class, 'update'])->name('admins/user/update');
    Route::post('admins/user/{user}/destroy', [UserController::class, 'destroy'])->name('admins/user/destroy');

    // User Role
    Route::get('admins/user-role/index', [UserRoleController::class, 'index'])->name('admins/user-role/index');
    Route::get('admins/user-role/{id}/create', [UserRoleController::class, 'create'])->name('admins/user-role/create');
    Route::post('admins/user-role/{id}/store', [UserRoleController::class, 'store'])->name('admins/user-role/store');

    // siswa
    Route::get('admins/siswa/index', [SiswaController::class, 'index'])->name('admins/siswa/index');
    Route::get('admins/siswa/create', [SiswaController::class, 'create'])->name('admins/siswa/create');
    Route::post('admins/siswa/store', [SiswaController::class, 'store'])->name('admins/siswa/store');
    Route::get('admins/siswa/{siswa}/edit', [SiswaController::class, 'edit'])->name('admins/siswa/edit');
    Route::post('admins/siswa/{siswa}/update', [SiswaController::class, 'update'])->name('admins/siswa/update');
    Route::post('admins/siswa/{siswa}/destroy', [SiswaController::class, 'destroy'])->name('admins/siswa/destroy');

    // Tagihan
    Route::get('admins/tagihan/index', [TagihanController::class, 'index'])->name('admins/tagihan/index');
    Route::get('admins/tagihan/create', [TagihanController::class, 'create'])->name('admins/tagihan/create');
    Route::post('admins/tagihan/store', [TagihanController::class, 'store'])->name('admins/tagihan/store');
    Route::get('admins/tagihan/{tagihan}/edit', [TagihanController::class, 'edit'])->name('admins/tagihan/edit');
    Route::post('admins/tagihan/{tagihan}/update', [TagihanController::class, 'update'])->name('admins/tagihan/update');
    Route::post('admins/tagihan/{tagihan}/destroy', [TagihanController::class, 'destroy'])->name('admins/tagihan/destroy');

    // pembayaran
    Route::get('admins/pembayaran/index', [AdminPembayaranController::class, 'index'])->name('admins/pembayaran/index');
    Route::get('admins/pembayaran/{id}/create', [AdminPembayaranController::class, 'create'])->name('admins/pembayaran/create');
    Route::post('admins/pembayaran/{id}/store', [AdminPembayaranController::class, 'store'])->name('admins/pembayaran/store');

    // Hostori
    Route::get('admins/histori/index', [HistoriController::class, 'index'])->name('admins/histori/index');

    // jurusan
    Route::get('admins/jurusan/index', [JurusanController::class, 'index'])->name('admins/jurusan/index');
    Route::get('admins/jurusan/create', [JurusanController::class, 'create'])->name('admins/jurusan/create');
    Route::post('admins/jurusan/store', [JurusanController::class, 'store'])->name('admins/jurusan/store');
    Route::get('admins/jurusan/{jurusan}/edit', [JurusanController::class, 'edit'])->name('admins/jurusan/edit');
    Route::post('admins/jurusan/{jurusan}/update', [JurusanController::class, 'update'])->name('admins/jurusan/update');
    Route::post('admins/jurusan/{jurusan}/destroy', [JurusanController::class, 'destroy'])->name('admins/jurusan/destroy');

    // kelas
    Route::get('admins/kelas/index', [KelasController::class, 'index'])->name('admins/kelas/index');
    Route::get('admins/kelas/create', [KelasController::class, 'create'])->name('admins/kelas/create');
    Route::post('admins/kelas/store', [KelasController::class, 'store'])->name('admins/kelas/store');
    Route::get('admins/kelas/{kelas}/edit', [KelasController::class, 'edit'])->name('admins/kelas/edit');
    Route::post('admins/kelas/{kelas}/update', [KelasController::class, 'update'])->name('admins/kelas/update');
    Route::post('admins/kelas/{kelas}/destroy', [KelasController::class, 'destroy'])->name('admins/kelas/destroy');

    // Laporan
    Route::get('admins/laporan/index', [LaporanController::class, 'index'])->name('admins/laporan/index');
    Route::get('admins/laporan', [LaporanController::class, 'create'])->name('admins/laporan');
    Route::post('admins/laporan/print', [LaporanController::class, 'print'])->name('admins/laporan/print');


    // Profil 
    // Route::get('admins');


    // {{ Route TataUsaha }}
    // siswa
    Route::get('tatus/siswa/index', [TatusSiswaController::class, 'index'])->name('tatus/siswa/index');
    Route::get('tatus/siswa/create', [TatusSiswaController::class, 'create'])->name('tatus/siswa/create');
    Route::post('tatus/siswa/store', [TatusSiswaController::class, 'store'])->name('tatus/siswa/store');
    Route::get('tatus/siswa/{siswa}/edit', [TatusSiswaController::class, 'edit'])->name('tatus/siswa/edit');
    Route::post('tatus/siswa/{siswa}/update', [TatusSiswaController::class, 'update'])->name('tatus/siswa/update');
    Route::post('tatus/siswa/{siswa}/destroy', [TatusSiswaController::class, 'destroy'])->name('tatus/siswa/destroy');


    // Profil 
    // Route::get('tatus/profil/{user}/edit', [UserContoller::class, 'edit'])->name('tatus/profil/edit');
    // Route::post('tatus/profil/{user}/update', [ProfilController::class, 'update'])->name('tatus/profil/update');
});
