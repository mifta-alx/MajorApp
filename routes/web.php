<?php

use App\Http\Controllers\CriteriasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MajorsController;
use App\Http\Controllers\ScoresController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SchoolsController;
use App\Http\Controllers\SubcriteriasController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\RankingsController;
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
Route::resource('majors', MajorsController::class);
Route::resource('criterias', CriteriasController::class);
Route::resource('subcriterias', SubcriteriasController::class);
Route::resource('scores', ScoresController::class);
Route::resource('results', ResultsController::class);
Route::resource('rankings', RankingsController::class);
//exportPDF route
Route::get('report-students', [StudentsController::class, 'exportPdf'])->name('exportStudents');
Route::get('report-schools', [SchoolsController::class, 'exportPdf'])->name('exportSchools');
Route::get('report-scores', [ScoresController::class, 'exportPdf'])->name('exportScores');
Route::get('report-results', [ResultsController::class, 'exportPdf'])->name('exportResults');
Route::get('report-rankings', [RankingsController::class, 'exportPdf'])->name('exportRankings');


