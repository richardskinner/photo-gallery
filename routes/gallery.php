<?php

use App\Http\Controllers\ImageGalleryController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('gallery', [ImageGalleryController::class, 'index'])->name('gallery.index');
    Route::get('gallery/create', [ImageGalleryController::class, 'create'])->name('gallery.create');
    Route::post('gallery/store', [ImageGalleryController::class, 'store'])->name('gallery.store');
    Route::delete('gallery/delete/{image}', [ImageGalleryController::class, 'delete'])->name('gallery.delete');
});
