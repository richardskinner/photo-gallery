<?php

use App\Http\Controllers\ImageGalleryController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('gallery', [ImageGalleryController::class, 'index'])->name('gallery.index');
});
