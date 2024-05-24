<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\adminController;




Route::resource('products', ProductController::class);


Route::get('/', [ProductController::class, 'shop'])->name('shop');
Route::get('/cart/add/{id}', [ProductController::class, 'addToCart'])->name('products.addToCart');




// Route pour afficher le formulaire de connexion
Route::get('/login', [adminController::class, 'showLoginForm'])->name('login');

// Route pour gérer la soumission du formulaire de connexion
Route::post('/login', [adminController::class, 'login']);

// Route pour afficher le tableau de bord
Route::get('/dashboard', [adminController::class, 'dashboard'])->middleware('auth')->name('dashboard');

// Route pour déconnecter l'utilisateur
Route::post('/logout', [adminController::class, 'logout'])->middleware('auth')->name('logout');


//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
