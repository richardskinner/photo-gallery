<?php

use App\Http\Controllers\ImageGalleryController;
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

Route::get('image-gallery', [ImageGalleryController::class, 'index'])->name('index');
Route::post('image-gallery', [ImageGalleryController::class, 'upload'])->name('upload');
Route::delete('image-gallery/{image}', [ImageGalleryController::class, 'destroy']);
