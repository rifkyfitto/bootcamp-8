<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = [
        ['name' => 'Laravel Hoodie', 'price' => '$59.99', 'image' => 'https://laravel.com/img/merch/hoodie-black.png'],
        ['name' => 'Laravel T-Shirt', 'price' => '$29.99', 'image' => 'https://laravel.com/img/merch/tshirt-black.png'],
        ['name' => 'Laravel Cap', 'price' => '$24.99', 'image' => 'https://laravel.com/img/merch/cap-black.png'],
    ];

    return view('welcome', compact('products'));
});

Route::get('/products', function () {
    return view('products');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/checkout', function () {
    return view('checkout');
});
