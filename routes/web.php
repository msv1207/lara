<?php

use App\Http\Controllers\formController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\imageController;

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


Route::view('update', 'updateImage');

Route::view('/', 'uploadImage');

Route::post('/line', [formController::class, 'line'])->name('line');

Route::post('/rectangle', [formController::class, 'rectangle'])->name('rectangle');

Route::post('/arc', [formController::class, 'arc'])->name('arc');

Route::post('/triangle', [formController::class, 'triangle'])->name('triangle');

Route::post('/text', [formController::class, 'text'])->name('text');

Auth::routes();

Route::get('/home', [HomeController::class, 'index']);


Route::resource('image', imageController::class);
