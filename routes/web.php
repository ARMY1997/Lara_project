<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CardController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cards/create', [App\Http\Controllers\CardController::class,'create'])->name('card.create');

Route::get('/cards', [App\Http\Controllers\CardController::class,'index'])->name('card.index');

Route::get('/cards/{id}', [App\Http\Controllers\HomeController::class,'edit'])->name('home.edit');

//Route::post('/cards', [App\Http\Controllers\CardController::class,'store'])->name('card.store');

Route::post('/card', [App\Http\Controllers\HomeController::class,'store'])->name('home.store');;

Route::get('/cards/{card}', [App\Http\Controllers\CardController::class,'show'])->name('card.show');

Route::get('cards/create', [App\Http\Controllers\HomeController::class,'create'])->name('home.create');

//Route::put('/cards/{card}', [App\Http\Controllers\CardController::class,'update'])->name('card.update');

Route::put('/cards', [App\Http\Controllers\HomeController::class,'update'])->name('home.update');

Route::delete('/cards/{card}', [App\Http\Controllers\CardController::class,'destroy'])->name('card.destroy');

Route::delete('cards/{card}', [App\Http\Controllers\HomeController::class,'destroy'])->name('home.destroy');

//Route::resource('/cards', [HomeController::class]);

//Route::resource('/cards', [CardController::class]);