<?php

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
    return view('home');
})->name('home');

Route::get('/admin', function () {
    return view('pages/admin/dashboard');
})->name('dashboard');

Route::get('admin/alternatif', function () {
    return view('pages/admin/alternatif/base');
})->name('alternatif');

Route::get('admin/alternatif/add', function () {
    return view('pages/admin/alternatif/add');
})->name('addalternatif');

Route::get('admin/siswa', function () {
    return view('pages/admin/siswa/base');
})->name('siswa');

Route::get('admin/siswa/add', function () {
    return view('pages/admin/siswa/add');
})->name('addsiswa');

Route::get('admin/users', function () {
    return view('pages/admin/users/base');
})->name('users');

Route::get('admin/users/add', function () {
    return view('pages/admin/users/add');
})->name('addusers');

Route::get('admin/kriteria', function () {
    return view('pages/admin/kriteria/base');
})->name('kriteria');

Route::get('admin/subkriteria', function () {
    return view('pages/admin/subkriteria/base');
})->name('subkriteria');

Route::get('admin/nilai', function () {
    return view('pages/admin/nilai/base');
})->name('nilai');
