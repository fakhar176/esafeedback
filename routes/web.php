<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');

});


Route::get('/evaluations', [EvaluationController::class, 'showForm'])->name('evaluation.form');
Route::post('/evaluation/store', [EvaluationController::class, 'store'])->name('evaluation.store');







Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//    Route::get('/evaluation/form', [EvaluationController::class, 'showForm'])->name('evaluation.form');
//    Route::post('/evaluation/store', [EvaluationController::class, 'store'])->name('evaluation.store');
    Route::get('/evaluation/export', [EvaluationController::class, 'exportExcel'])->name('evaluation.export');
    Route::get('/evaluation/analysis', [EvaluationController::class, 'analysisSummary'])->name('evaluation.analysis');
});
