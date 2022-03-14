<?php

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

