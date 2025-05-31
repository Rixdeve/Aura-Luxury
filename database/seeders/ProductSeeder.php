<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'product_name'      => 'Classic Leather Watch',
            'description'       => 'A premium leather watch for men.',
            'price'             => 15000.00,
            'discounted_price'  => 12000.00,
            'types'             => 'Male',
            'availability'      => 'In Stock',
            'qty'               => 25,
            'brand'             => 'Omega',
            'watch_color'       => 'Brown',
            'img_url'           => 'images/watch1.jpg',
            'category'          => 'Watch',
        ]);

        Product::create([
            'product_name'      => 'Luxury Perfume',
            'description'       => 'Elegant scent for all occasions.',
            'price'             => 8000.00,
            'discounted_price'  => null,
            'types'             => 'Unisex',
            'availability'      => 'Out of Stock',
            'qty'               => 0,
            'brand'             => 'Dior',
            'watch_color'       => null,
            'img_url'           => 'images/perfume1.jpg',
            'category'          => 'Perfume',
        ]);
    }
}
