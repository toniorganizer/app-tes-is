<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KepentinganController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\PekerjaController;
use App\Http\Controllers\PemberiInformasiController;
use App\Models\InformasiLowongan;
use App\Models\PemberiInformasi;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    $data = InformasiLowongan::get();
    return view('halaman-utama.index', [
        'data' => $data
    ]);
});

Route::get('/user-faq', function () {
    return view('dashboard.admin.user_faq');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/home', 'index');
    Route::get('/profil-tenaga-kerja/{id}', 'profilTenagaKerja');
    Route::get('/edit-deskripsi/{id}', 'edit_deskripsi_lowongan');
    Route::post('/update-deskripsi-lowongan', 'update_deskripsi_lowongan');
});

// auth
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login_action', 'login_action')->name('login_action');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/detail-informasi-lowongan/{id}', 'detail_lowongan');
    Route::post('/register', 'register_pekerja');
    Route::post('/register_perusahaan', 'register_perusahaan');
});

Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['CekUser:1,2']], function () {
        Route::resource('/user', AdminController::class);
            Route::controller(AdminController::class)->group(function () {
                Route::get('/dashboard', 'index');
                Route::get('/user', 'index');
                Route::get('/user-data', 'userData');
                Route::get('/tenaga-kerja-data', 'tenagaKerjaData');
                Route::get('/pekerjaan-data', 'pekerjaanData');
                Route::post('/addTenagaKerja', 'tambahTenagaKerja');
                Route::get('/deleteTenagaKerja/{id}', 'hapusTenagaKerja');
                Route::post('profil-tenaga-kerja/edit-tenaga-kerja', 'updateTenagaKerja');
            });
    });

    Route::resource('/pekerja', PekerjaController::class);
    Route::resource('/pemerintah', KepentinganController::class);
    Route::resource('/lowongan', LowonganController::class);
    Route::resource('/sumber', PemberiInformasiController::class);

    Route::post('/lowongan/{id}/verifikasi', [LowonganController::class, 'verifikasiLowongan'])->name('lowongan.verifikasi');
    Route::controller(PekerjaController::class)->group(function () {
        Route::get('/data-lowongan-pekerja', 'index');
        Route::get('/detail-lowongan-pekerja/{id}', 'DetailLowongan');
        Route::get('/lamar-pekerjaan/{id}', 'lamarPekerjaan');
        Route::post('/lamar-lowongan-pekerjaan', 'lamarLowonganPekerjaan');
    });

    Route::controller(PemberiInformasiController::class)->group(function () {
        Route::get('/lowongan-data', 'data_lowongan');
    });

    // Route::group(['middleware' => ['CekUser:2']], function () {
    //     Route::resource('/dashboard-pekerja', PekerjaController::class);
    // });

    // Route::group(['middleware' => ['CekUser:3']], function () {
    //     Route::resource('/pemerintah', KepentinganController::class);
    // });
});


// user register
Route::get('/user-register', function () {
    return view('dashboard.auth.register');
});

Route::get('/perusahaan-register', function () {
    return view('dashboard.auth.register_perusahaan');
});

Route::get('/error-akses', function () {
    return view('dashboard.error_akses');
});
