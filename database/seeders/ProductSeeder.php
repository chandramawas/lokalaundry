<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Molto Sachet 40ml',
                'price' => 3000,
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pewangi Rinso 40ml',
                'price' => 1000,
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tas Tenteng',
                'price' => 5000,
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tas Plastik',
                'price' => 3000,
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Product::insert($products);
    }
}
