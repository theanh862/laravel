<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

Route::prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
    });
});



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{id}', [HomeController::class, 'showCategory'])->name('category.show');

Route::get('/category/{category}/products/create', [ProductController::class, 'createInCategory'])->name('category.products.create');
Route::post('/category/{category}/products', [ProductController::class, 'storeInCategory'])->name('category.products.store');


Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
