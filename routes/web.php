<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Product\ProductController;

Auth::routes(['register' => false]);

Route::middleware('auth')->group(function() {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
});
