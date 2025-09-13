<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'role' => 'admin',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'username' => 'purchase',
            'password' => Hash::make('purchase'),
            'role' => 'purchase',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'username' => 'sale',
            'password' => Hash::make('sale'),
            'role' => 'sale',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'username' => 'finance',
            'password' => Hash::make('finance'),
            'role' => 'finance',
            'remember_token' => Str::random(10),
        ]);
    }
}
