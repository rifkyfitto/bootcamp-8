<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function viewProducts(){
        $data_toko = [
            'nama_toko' => 'Kyyttoo Store',
            'alamat_toko' => 'Jl. Kyyttoo No. 123, Jakarta',
            'kontak_toko' => '08123456789',
            'email_toko' => 'support@kyyttoo.com',
        ];

        $products = [
            [
                'nama' => 'Kemeja Flanel Premium',
                'harga' => 150000,
                'deskripsi' => 'Kemeja flanel dengan bahan katun lembut yang nyaman dipakai.',
                'image' => 'https://placehold.co/400x400?text=[Gambar+Kemeja+Flanel]'
            ],
            [
                'nama' => 'Kaos Polos Basic',
                'harga' => 75000,
                'deskripsi' => 'Kaos oblong bahan katun bambu 30s. Sangat adem.',
                'image' => 'https://placehold.co/400x400?text=[Gambar+Kaos+Polos]'
            ],
            [
                'nama' => 'Jaket Denim Pria',
                'harga' => 250000,
                'deskripsi' => 'Jaket jeans tebal dengan potongan reguler fit.',
                'image' => 'https://placehold.co/400x400?text=[Gambar+Jaket+Denim]'
            ],
            [
                'nama' => 'Celana Chino Slimfit',
                'harga' => 180000,
                'deskripsi' => 'Celana chino dengan bahan melar yang nyaman.',
                'image' => 'https://placehold.co/400x400?text=[Gambar+Celana+Chino]'
            ],
        ];

        return view('page.products', array_merge($data_toko, ['products' => $products]));
    }

    public function addProduct(){
        return view('page.addProduct');
    }
}
