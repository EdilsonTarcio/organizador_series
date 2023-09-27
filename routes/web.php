<?php

use App\Http\Controllers\EpisodesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TemporadaController;

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
    return redirect('series');
});

Route::resource('series', SeriesController::class);
Route::get('/series/{serie}/temporada', [TemporadaController::class, 'index'])->name('temporada.index');
Route::get('/temporadas/{temporada}/episodios', [EpisodesController::class, 'index'])->name('episodios.index');
Route::post('/temporadas/{temporada}/episodios', [EpisodesController::class, 'update'])->name('episodios.update');