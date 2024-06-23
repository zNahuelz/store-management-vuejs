<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'WAXILLIUM',
            'surname' => 'LADRIAN',
            'username' => 'admin',
            'email' => 'admin@store.com',
            'password' => Hash::make('admin'),
            'store_id' => 1,
            'role_id' => 1,
        ]);
    }
}
