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
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'example1@gmail.com',
            'phone' => '81234567890',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user->wallet()->update(['balance' => 100000]);
    }
}
