<?php

namespace Database\Seeders;

use App\Models\Outlet;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $outlets = [
            [
                'name' => 'Outlet Jakarta 1',
                'address' => 'Jl. Sudirman No.1, Jakarta',
                'city' => 'Jakarta',
                'phone' => '81234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Outlet Tangerang 1',
                'address' => 'Jl. Ahmad Yani No.10, Tangerang',
                'city' => 'Tangerang',
                'phone' => '81312345678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Outlet Medan 1',
                'address' => 'Jl. Sudirman No.1, Medan',
                'city' => 'Medan',
                'phone' => '81234567891',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Outlet::insert($outlets);
    }
}
