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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::get('cards/create', [App\Http\Controllers\CardController::class,'create'])->name('Cards.create');

Route::get('/cards', [App\Http\Controllers\CardController::class,'index'])
->name('cards.index');

Route::post('/cards', [App\Http\Controllers\CardController::class,'store'])->name('cards.store');

Route::get('cards/{card}', [CardController::class,'show'])
->name('cards.show');

Route::put('cards/{card}', [CardController::class,'update'])
->name('cards.update');

Route::delete('cards/{card}', [CardController::class,'destroy'])
->name('cards.destroy');
