<?php

use App\Http\Controllers\formController;
use App\Http\Controllers\UploadImageController;
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

Route::post('imageUpload', [UploadImageController::class, 'imageUploadPost'])->name('imageUpload');
Route::view('update', 'updateImage');

Route::get('show', [UploadImageController::class, 'index']);
Route::view('Upload', 'imageUpload');

Route::get('/line', [formController::class, 'line']);
Route::post('/line', [formController::class, 'line'])->name('line');

Route::get('/rectangle', [formController::class, 'rectangle']);
Route::post('/rectangle', [formController::class, 'rectangle'])->name('rectangle');

Route::get('/arc', [formController::class, 'arc']);
Route::post('/arc', [formController::class, 'arc'])->name('arc');

Route::get('/triangle', [formController::class, 'triangle']);
Route::post('/triangle', [formController::class, 'triangle'])->name('triangle');

Route::get('/text', [formController::class, 'text']);
Route::post('/text', [formController::class, 'text'])->name('text');
