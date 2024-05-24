<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;



Route::resource('products', ProductController::class);


Route::get('/', [ProductController::class, 'shop'])->name('shop');
Route::get('/cart/add/{id}', [ProductController::class, 'addToCart'])->name('products.addToCart');


