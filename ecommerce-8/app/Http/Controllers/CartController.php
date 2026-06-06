<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function viewCart(){
        // Menambahkan data contoh agar halaman tidak error saat memuat $cartItems
        $cartItems = [
            [
                'nama' => 'Kemeja Flanel Premium',
                'harga' => 150000,
                'qty' => 1,
                'kategori' => 'Pria',
                'image' => 'https://placehold.co/400x400?text=[Gambar+Kemeja+Flanel]'
            ],
            [
                'nama' => 'Kaos Polos Basic',
                'harga' => 75000,
                'qty' => 2,
                'kategori' => 'Unisex',
                'image' => 'https://placehold.co/400x400?text=[Gambar+Kaos+Polos]'
            ]
        ];

        return view('page.cart', compact('cartItems')); 
    }
}
