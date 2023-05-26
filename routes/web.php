<?php

use App\Http\Controllers\CriteriasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ScoresController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SchoolsController;
use App\Http\Controllers\SubcriteriasController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\RankingsController;
use App\Http\Controllers\PdfController;
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
    return view('pages.home');
})->name('home');

//new way to route
Route::resource('dashboard', DashboardController::class);
Route::resource('students', StudentsController::class);
Route::resource('schools', SchoolsController::class);
Route::resource('users', UsersController::class);
Route::resource('roles', RolesController::class);
Route::resource('criterias', CriteriasController::class);
Route::resource('subcriterias', SubcriteriasController::class);
Route::resource('scores', ScoresController::class);
Route::resource('results', ResultsController::class);
Route::resource('rankings', RankingsController::class);
Route::resource('report', PdfController::class);
//

// Route::get('admin/users', [UsersController::class, 'index'])->name('users.index');
// Route::get('admin/users/add', [UsersController::class, 'create'])->name('users.create');
// Route::post('admin/users', [UsersController::class, 'store'])->name('users.store');
// Route::delete('admin/users', [UsersController::class, 'destroy'])->name('users');

// Route::controller(UserController::class)->group(function (){
//     Route::get('ad')
// });

