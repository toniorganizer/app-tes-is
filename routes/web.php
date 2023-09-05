<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BursaKerjaController;
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
    $data = InformasiLowongan::join('users','users.id_user','=','informasi_lowongans.pemberi_informasi_id')->get();
    return view('halaman-utama.index', [
        'data' => $data
    ]);
});

Route::get('/lowongan-home', function () {
    $data = InformasiLowongan::join('users','users.id_user','=','informasi_lowongans.pemberi_informasi_id')->paginate(2);
    return view('halaman-utama.lowongan-home', ['data' => $data]);
});

Route::get('/user-faq', function () {
    return view('dashboard.admin.user_faq');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/home', 'index');
    Route::get('/profil-tenaga-kerja/{id}', 'profilTenagaKerja');
    Route::get('/edit-deskripsi/{id}', 'edit_deskripsi_lowongan');
    Route::post('/update-deskripsi-lowongan', 'update_deskripsi_lowongan');
    Route::get('/pekerjaan-data', 'pekerjaanData');
    Route::get('/tenaga-kerja-data', 'tenagaKerjaData');
});

// auth
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login_action', 'login_action')->name('login_action');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/detail-informasi-lowongan/{id}', 'detail_lowongan');
    Route::post('/register', 'register_pekerja');
    Route::post('/register_perusahaan', 'register_perusahaan');
    Route::post('/register_bkk', 'register_bkk');
    Route::get('/searching-lowongan', 'searching');
    Route::get('/searching-lokasi', 'searchingLokasi');
});

Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['CekUser:1,3']], function () {
        Route::resource('/user', AdminController::class);
            Route::controller(AdminController::class)->group(function () {
                Route::get('/dashboard', 'index');
                Route::get('/user', 'index');
                Route::get('/user-data', 'userData');
                Route::post('/addTenagaKerja', 'tambahTenagaKerja');
                Route::post('/register_user', 'registerUser');
                Route::get('/deleteTenagaKerja/{id}', 'hapusTenagaKerja');
                Route::get('/uji-laporan', 'testLaporan')->name('uji-laporan');
                Route::get('/laporan', 'Laporan')->name('laporan');
            });
    });

    Route::resource('/pekerja', PekerjaController::class);
    Route::resource('/pemerintah', KepentinganController::class);
    Route::resource('/lowongan', LowonganController::class);
    Route::resource('/sumber', PemberiInformasiController::class);
    Route::resource('/bursa', BursaKerjaController::class);

    Route::post('/lowongan/{id_informasi_lowongan?}/verifikasi', [LowonganController::class, 'verifikasiLowongan'])->name('lowongan.verifikasi');
    Route::controller(PekerjaController::class)->group(function () {
        Route::get('/data-lowongan-pekerja', 'index');
        Route::get('/detail-lowongan-pekerja/{id}', 'DetailLowongan');
        Route::get('/lamar-pekerjaan/{id}', 'lamarPekerjaan');
        Route::get('/tracer-study', 'tracerStudy');
        Route::post('/update-tracer-study', 'updateTracerStudy');
        Route::get('/edit-data-tracer/{id}', 'editDataTracer');
        Route::post('/update-data-tracer', 'updateDataTracer');
        Route::post('/lamar-lowongan-pekerjaan', 'lamarLowonganPekerjaan');
        Route::post('/perpanjangKartu', 'perpanjangKartu');
    });

    Route::controller(PemberiInformasiController::class)->group(function () {
        Route::get('/lowongan-data', 'data_lowongan');
        Route::get('/detail-pendaftar/{id}', 'data_pelamar');
        Route::get('/detail-data-pendaftar/{id}', 'detail_data_pelamar');
        Route::get('/lengkapi-data-lowongan/{id}', 'lengkapi_data_lowongan');
        Route::post('/sumber/{id_informasi_lowongan?}/update_informasi', 'updateInformasi')->name('sumber.update_informasi');
        Route::post('/sumber/{id_lamar?}/verifikasi', 'verifikasiPelamar')->name('sumber.verifikasi');
    });


    Route::controller(BursaKerjaController::class)->group(function (){
        Route::get('/tracer-data', 'dataTracer');
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

Route::get('/bkk-register', function () {
    return view('dashboard.auth.register_bkk');
});

Route::get('/error-akses', function () {
    return view('dashboard.error_akses');
});

Route::get('log-viewers', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
