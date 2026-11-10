<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Simple Cake',
            'Custom Cake',
            'Cupcake',
            'Bento Cake'
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => Str::slug($category),
                'description' => 'Kategori pilihan terbaik untuk ' . $category . ' di Tbloom Cake & Bakery.',
            ]);
        }
    }
}