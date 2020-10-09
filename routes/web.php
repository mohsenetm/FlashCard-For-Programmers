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

Route::any('register',[\App\Http\Controllers\UserController::class,'register'])->name('register');
Route::middleware('auth')->resource('decks' , \App\Http\Controllers\DeckController::class);
Route::middleware('auth')->resource('decks.flash' , \App\Http\Controllers\FlashController::class)->shallow();

Route::middleware('auth')->get('read/{id}',[\App\Http\Controllers\FlashController::class,'read'])->name('flash.read');
Route::middleware('auth')->get('read-all/',[\App\Http\Controllers\FlashController::class,'readAll'])->name('flash.read.all');
Route::middleware('auth')->post('stored',[\App\Http\Controllers\FlashController::class,'stored'])->name('flash.stored');
Route::redirect('/','decks/');

Route::get('chart',[\App\Http\Controllers\ChartController::class,'index'])->name('chart.index');
Route::post('chart/time',[\App\Http\Controllers\ChartController::class,'time'])->name('chart.list');
