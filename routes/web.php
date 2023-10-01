<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TemporadaController;
use App\Http\Middleware\Autenticador;
use App\Mail\SeriesCreated;

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
    return redirect('login');
});

//agrupando rotas dentro do middleware
Route::middleware(Autenticador::class)->group(function(){

    Route::resource('series', SeriesController::class);
    Route::get('/series/{serie}/temporada', [TemporadaController::class, 'index'])->name('temporada.index');
    Route::get('/temporadas/{temporada}/episodios', [EpisodesController::class, 'index'])->name('episodios.index');
    Route::post('/temporadas/{temporada}/episodios', [EpisodesController::class, 'update'])->name('episodios.update');    
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/sair', [LoginController::class, 'destroy'])->name('sair.logout');
Route::post('/login', [LoginController::class, 'store'])->name('logar');
Route::get('/registrar', [UsersController::class, 'create'])->name('users.create');
Route::post('/registrar', [UsersController::class, 'store'])->name('users.store');

Route::get('/email', function(){
    return new SeriesCreated();
});