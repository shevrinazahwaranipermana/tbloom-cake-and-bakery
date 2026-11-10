<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'category_id' => 1, // Simple Cake
            'name' => 'Choco Fudge Simple Cake',
            'description' => 'Kue cokelat lembut dengan baluran fudge cokelat premium yang manis dan lumer di mulut.',
            'price' => 125000,
            'image' => 'choco_fudge.jpg',
            'is_best_seller' => true,
        ]);

        Product::create([
            'category_id' => 4, // Bento Cake
            'name' => 'Korean Bento Cake Love',
            'description' => 'Kue bento ala Korea ukuran mini dengan hiasan estetik, cocok untuk kejutan ulang tahun atau anniversary.',
            'price' => 75000,
            'image' => 'bento_cake.jpg',
            'is_best_seller' => true,
        ]);

        Product::create([
            'category_id' => 3, // Cupcake
            'name' => 'Vanilla Velvet Cupcake Box (Isi 4)',
            'description' => 'Cupcake lembut rasa vanilla dengan krim manis warna-warni di atasnya.',
            'price' => 60000,
            'image' => 'cupcake.jpg',
            'is_best_seller' => false,
        ]);
    }
}