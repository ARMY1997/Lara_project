<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CardController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['middleware' => ['role:Admin']], function () {
    Route::get('/admin_panel', [App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin');
    Route::delete('admin_panel/{user}', [App\Http\Controllers\Admin\MainController::class,'destroy'])->name('main.destroy');
    Route::get('/admin_panel/{id}', [App\Http\Controllers\Admin\MainController::class,'edit'])->name('main.edit');
    Route::put('/admin_panel', [App\Http\Controllers\Admin\MainController::class,'update'])->name('main.update');
    Route::get('/admin_panel/read/{user}', [App\Http\Controllers\Admin\MainController::class,'read'])->name('main.read');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cards/create', [App\Http\Controllers\CardController::class,'create'])->name('card.create');
Route::get('/cards/{id}', [App\Http\Controllers\HomeController::class,'edit'])->name('home.edit');
Route::post('/card', [App\Http\Controllers\HomeController::class,'store'])->name('home.store');;
Route::get('/cards/{card}', [App\Http\Controllers\HomeController::class,'show'])->name('home.show');
Route::get('cards/create', [App\Http\Controllers\HomeController::class,'create'])->name('home.create');
Route::put('/cards', [App\Http\Controllers\HomeController::class,'update'])->name('home.update');
Route::delete('cards/{card}', [App\Http\Controllers\HomeController::class,'destroy'])->name('home.destroy');