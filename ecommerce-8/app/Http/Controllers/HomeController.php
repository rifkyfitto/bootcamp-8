<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function HomeSection(){
        $products = [
            [
                'nama' => 'Kemeja Flanel Premium',
                'harga' => 150000,
                'deskripsi' => 'Kemeja flanel dengan bahan katun lembut yang nyaman dipakai untuk gaya kasual sehari-hari.',
                'image' => 'https://placehold.co/400x400?text=[Gambar+Kemeja+Flanel]'
            ],
            [
                'nama' => 'Kaos Polos Basic',
                'harga' => 75000,
                'deskripsi' => 'Kaos oblong bahan katun bambu 30s. Sangat adem dan menyerap keringat.',
                'image' => 'https://placehold.co/400x400?text=[Gambar+Kaos+Polos]'
            ],
            [
                'nama' => 'Jaket Denim Pria',
                'harga' => 250000,
                'deskripsi' => 'Jaket jeans tebal dengan potongan reguler fit. Cocok dipadukan dengan berbagai outfit.',
                'image' => 'https://placehold.co/400x400?text=[Gambar+Jaket+Denim]'
            ],
            [
                'nama' => 'Celana Chino Slimfit',
                'harga' => 180000,
                'deskripsi' => 'Celana chino dengan bahan melar (stretch) yang memberikan kenyamanan maksimal.',
                'image' => 'https://placehold.co/400x400?text=[Gambar+Celana+Chino]'
            ],
            // Anda bisa menambahkan data ke-5, ke-6, dst di sini, dan otomatis akan muncul di halaman!
        ];

        $nama = "Pelanggan Setia";
        return view('page.home', compact('products', 'nama'));
    }
}
