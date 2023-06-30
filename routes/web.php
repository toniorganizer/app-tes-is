<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KepentinganController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PekerjaController;
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
    return view('halaman-utama.index');
});

Route::get('/user-data', function () {
    return view('Dashboard.admin.user_data');
});

Route::get('/user-profile', function () {
    return view('Dashboard.admin.user_profile');
});

Route::get('/user-faq', function () {
    return view('dashboard.admin.user_faq');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/dashboard', 'index')->middleware('auth');
    Route::get('/home', 'index')->middleware('auth');
});

// auth
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login_action', 'login_action')->name('login_action');
    Route::get('/logout', 'logout')->name('logout');
});

Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['CekUser:1,2']], function () {
        Route::resource('/dashboard-admin', AdminController::class);
        // Route::resource('/dashboard-pekerja', PekerjaController::class);
    });

    Route::resource('/dashboard-pekerja', PekerjaController::class);
    Route::resource('/pemerintah', KepentinganController::class);

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

Route::get('/error-akses', function () {
    return view('dashboard.error_akses');
});
