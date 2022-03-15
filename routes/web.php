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

Route::get('imageUpload', [UploadImageController::class, 'imageUpload']);
Route::post('imageUpload', [UploadImageController::class, 'imageUploadPost'])->name('imageUpload');
Route::get('show', [UploadImageController::class, 'index']);
Route::get('test', [UploadImageController::class, 'update']);
Route::get('/line', [formController::class, 'line']);
Route::post('/line', [formController::class, 'line'])->name('line');

Route::get('/rectangle', [formController::class, 'rectangle']);
Route::post('/rectangle', [formController::class, 'rectangle'])->name('rectangle');

Route::get('/{form}', [formController::class, 'triangle'])->where('form', 'triangle');
Route::get('/arc', [formController::class, 'arc'])->where('form', 'arc');
Route::get('/{form}', [formController::class, 'text'])->where('form', 'text');
Route::view('test1', 'updateImage');


