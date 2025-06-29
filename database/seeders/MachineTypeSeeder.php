<?php

namespace Database\Seeders;

use App\Models\MachineType;
use Illuminate\Database\Seeder;

class MachineTypeSeeder extends Seeder
{
    public function run(): void
    {
        MachineType::insert([
            [
                'name' => 'Mesin Cuci Maks. 10kg',
                'type' => 'w',
                'capacity' => 10,
                'price' => 8000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mesin Cuci Maks. 16kg',
                'type' => 'w',
                'capacity' => 16,
                'price' => 14000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mesin Cuci Maks. 33kg',
                'type' => 'w',
                'capacity' => 33,
                'price' => 20000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pengering',
                'type' => 'd',
                'capacity' => null,
                'price' => 20000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
