<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CartController;


use Database\Factories\ProductFactory;
use Illuminate\Support\Facades\Auth;






Route::get('/', [ProductController::class, 'hom']);

Route::post('/cart/add/{id}', [ProductController::class, 'addToCart'])->name('products.addToCart');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/applyCoupon', [CartController::class, 'applyCoupon'])->name('cart.applyCoupon');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');

Route::resource('products', ProductController::class);


Route::get('/contact', [ClientController::class, 'showContactForm'])->name('contact.show');

Route::get('/home', [ProductController::class, 'hom'])->name('home');

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.showe');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edite');

// Route pour supprimer un produit
Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.updat');


// Route pour afficher le formulaire de connexion
Route::get('/login', [adminController::class, 'showLoginForm'])->name('login');


// Route pour gérer la soumission du formulaire de connexion
Route::post('/login', [adminController::class, 'login'])->name('logine');

// Route pour afficher le tableau de bord

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [adminController::class, 'dashboard'])->name('dashboard');
    Route::get('/hom', [adminController::class, 'shop'])->name('vesiteurs.hom');
});
Route::get('/dashboard/products', [adminController::class, 'index'])->middleware('auth')->name('dashboard.index');
Route::get('/dashboard/users', [adminController::class, 'showUsers'])->name('clients.users');

Route::get('/dashboard/products/create', [adminController::class, 'create'])->middleware('auth')->name('dashboard.create');


// Route pour déconnecter l'utilisateur
Route::post('/logout', [adminController::class, 'logout'])->name('logout');
// routes/web.php
Route::delete('/products/{id}', [App\Http\Controllers\adminController::class, 'destroy']);


//Auth::routes();

Route::get('/register', [adminController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [adminController::class, 'register'])->name('register');

