<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('home', 'HomeController@index')->name('home');


Route::get('user', 'UserController@index');

//Register Guru
    Route::get('register-guru', 'UserController@registerGuru')->name('register.guru');
    Route::post('register-guru', 'UserController@storeGuru')->name('store.guru');

//Register Siswa
    Route::get('register-siswa', 'UserController@registerSiswa')->name('register.siswa');
    Route::post('register-siswa', 'UserController@storeSiswa')->name('store.siswa');

Auth::routes();

//Admin Login
    Route::get('admin-login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('admin-login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('admin-logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

//Admin
    Route::get('admin', 'Auth\AdminController@index')->name('admin.dashboard');
    Route::get('admin-profile', 'Auth\AdminController@edit')->name('admin.profile');
    Route::put('admin-profile', 'Auth\AdminController@update')->name('admin.profile.update');
    Route::post('admin-profile', 'Auth\AdminController@password')->name('admin.password.update');
    //User-list
        Route::get('user-list', 'Auth\AdminController@userList')->name('admin.user-list');
        Route::delete('user-delete', 'Auth\AdminController@userDelete')->name('admin.user-delete');
    //Guru-list
        Route::get('guru-list', 'Auth\AdminController@guruList')->name('admin.guru-list');
        Route::get('pengajuan-guru', 'Auth\AdminController@pengajuanGuru')->name('admin.pengajuan-guru');
        Route::post('accept/{id}', 'Auth\AdminController@accept')->name('admin-accept');
        // Route::post('accept', 'Auth\AdminController@accept')->name('admin.pengajuan-accept');
        // Route::post('reject/{id}', 'Auth\AdminController@reject')->name('admin.pengajuan-reject');
    //Siswa-list
        Route::get('siswa-list', 'Auth\AdminController@siswaList')->name('admin.siswa-list');
    //Jadwal-list
        Route::get('admin-jadwal-list', 'Auth\AdminController@listJadwal')->name('admin.jadwal-list');

//User
Route::get('/profile', 'ProfileController@edit')->name('user.profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

//User-Jadwal
    //Guru
    Route::get('jadwal-list', 'JadwalController@index')->name('user.jadwal-list');
    Route::get('pengajuan-jadwal', 'JadwalController@pengajuanJadwal')->name('user.pengajuan-jadwal');
    Route::post('accept-jadwal/{id}', 'JadwalController@acceptPengajuan')->name('user.accept-jadwal');
    Route::post('decline-jadwal/{id}', 'JadwalController@declinePengajuan')->name('user.decline-jadwal');

    //Siswa
    Route::get('jadwal-siswa', 'JadwalController@jadwalSiswa')->name('jadwal-siswa');
    Route::get('daftar-pengajuan', 'JadwalController@daftarPengajuan')->name('daftar-pengajuan-siswa');
    Route::get('tambah-jadwal', 'JadwalController@tambahJadwal')->name('tambah-jadwal-siswa');
    Route::post('tambah-jadwal', 'JadwalController@storeJadwal')->name('store-jadwal-siswa');
// Route::prefix('user')->group(function() {
//     Route::get('/profile', 'ProfileController@edit')->name('user.profile');
// }) ;
