<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

// use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'HomeSection'])->name('home');

Route::get('/products', [ProductController::class, 'viewProducts']);

Route::get('/addProduct', [ProductController::class, 'addProduct']);

Route::get('/cart', [CartController::class, 'viewCart']);