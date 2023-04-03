<?php

use App\Http\Controllers\AlternativesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UsersController;
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
    return view('pages.user.home');
})->name('home');
//users
// Route::get('/user', [StudentsController::class, 'register'])->name('user');
Route::resource('students', StudentsController::class);


Route::get('/admin', function () {
    return view('pages/admin/dashboard');
})->name('dashboard');

// Route::get('admin/alternatif', function () {
//     return view('pages/admin/alternatif/base');
// })->name('alternatif');

// Route::get('admin/alternatif/add', function () {
//     return view('pages/admin/alternatif/add');
// })->name('addalternatif');

Route::get('admin/siswa',[StudentsController::class, 'index'])->name('siswa');

Route::get('admin/siswa/add', function () {
    return view('pages/admin/siswa/add');
})->name('addsiswa');

//new way to route
Route::resource('alternatif', AlternativesController::class);
Route::resource('users', UsersController::class);
//

// Route::get('admin/users', [UsersController::class, 'index'])->name('users.index');
// Route::get('admin/users/add', [UsersController::class, 'create'])->name('users.create');
// Route::post('admin/users', [UsersController::class, 'store'])->name('users.store');
// Route::delete('admin/users', [UsersController::class, 'destroy'])->name('users');

// Route::controller(UserController::class)->group(function (){
//     Route::get('ad')
// });

Route::get('admin/kriteria', function () {
    return view('pages/admin/kriteria/base');
})->name('kriteria');

Route::get('admin/subkriteria', function () {
    return view('pages/admin/subkriteria/base');
})->name('subkriteria');

Route::get('admin/nilai', function () {
    return view('pages/admin/nilai/base');
})->name('nilai');



