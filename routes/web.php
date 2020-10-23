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
Route::any('/test', [App\Http\Controllers\TestController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// file-upload
Route::get('file-upload', [ App\Http\Controllers\FileUploadController::class, 'fileUpload' ])->name('file.upload');
Route::post('file-upload', [ App\Http\Controllers\FileUploadController::class, 'fileUploadPost' ])->name('file.upload.post');

