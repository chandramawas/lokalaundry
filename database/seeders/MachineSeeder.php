<?php

namespace Database\Seeders;

use App\Models\Machine;
use App\Models\MachineType;
use App\Models\Outlet;
use Illuminate\Database\Seeder;

class MachineSeeder extends Seeder
{
    public function run(): void
    {
        $outlets = Outlet::all();
        $types = MachineType::all();

        $machines = [
            // Outlet 1
            ['number' => 'W-01', 'outlet_id' => $outlets->where('city', 'Jakarta')->first()->id, 'machine_type_id' => $types->where('capacity', 10)->first()->id],
            ['number' => 'W-02', 'outlet_id' => $outlets->where('city', 'Jakarta')->first()->id, 'machine_type_id' => $types->where('capacity', 10)->first()->id],
            ['number' => 'W-03', 'outlet_id' => $outlets->where('city', 'Jakarta')->first()->id, 'machine_type_id' => $types->where('capacity', 10)->first()->id],
            ['number' => 'W-04', 'outlet_id' => $outlets->where('city', 'Jakarta')->first()->id, 'machine_type_id' => $types->where('capacity', 16)->first()->id],
            ['number' => 'W-05', 'outlet_id' => $outlets->where('city', 'Jakarta')->first()->id, 'machine_type_id' => $types->where('capacity', 16)->first()->id],
            ['number' => 'W-06', 'outlet_id' => $outlets->where('city', 'Jakarta')->first()->id, 'machine_type_id' => $types->where('capacity', 33)->first()->id],
            ['number' => 'D-01', 'outlet_id' => $outlets->where('city', 'Jakarta')->first()->id, 'machine_type_id' => $types->where('type', 'd')->first()->id],
            ['number' => 'D-02', 'outlet_id' => $outlets->where('city', 'Jakarta')->first()->id, 'machine_type_id' => $types->where('type', 'd')->first()->id],

            // Outlet 2
            ['number' => 'W-01', 'outlet_id' => $outlets->where('city', 'Tangerang')->first()->id, 'machine_type_id' => $types->where('capacity', 10)->first()->id],
            ['number' => 'W-02', 'outlet_id' => $outlets->where('city', 'Tangerang')->first()->id, 'machine_type_id' => $types->where('capacity', 10)->first()->id],
            ['number' => 'W-03', 'outlet_id' => $outlets->where('city', 'Tangerang')->first()->id, 'machine_type_id' => $types->where('capacity', 10)->first()->id],
            ['number' => 'W-04', 'outlet_id' => $outlets->where('city', 'Tangerang')->first()->id, 'machine_type_id' => $types->where('capacity', 16)->first()->id],
            ['number' => 'W-05', 'outlet_id' => $outlets->where('city', 'Tangerang')->first()->id, 'machine_type_id' => $types->where('capacity', 16)->first()->id],
            ['number' => 'D-01', 'outlet_id' => $outlets->where('city', 'Tangerang')->first()->id, 'machine_type_id' => $types->where('type', 'd')->first()->id],

            // Outlet 2
            ['number' => 'W-01', 'outlet_id' => $outlets->where('city', 'Medan')->first()->id, 'machine_type_id' => $types->where('capacity', 10)->first()->id],
            ['number' => 'W-02', 'outlet_id' => $outlets->where('city', 'Medan')->first()->id, 'machine_type_id' => $types->where('capacity', 10)->first()->id],
            ['number' => 'D-01', 'outlet_id' => $outlets->where('city', 'Medan')->first()->id, 'machine_type_id' => $types->where('type', 'd')->first()->id],
        ];

        foreach ($machines as $machine) {
            Machine::create($machine);
        }
    }
}
