<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wallet;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin lokaLaundry',
            'email' => 'admin@lokalaundry.com',
            'phone' => '81234567890',
            'password' => Hash::make('admin'),
            'is_admin' => true,
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $admin->wallet()->update(['balance' => 1000000]);
    }
}
