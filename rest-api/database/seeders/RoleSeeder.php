<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'description' => 'ADMINISTRATOR'
            ],
            [
                'description' => 'EMPLOYEE'
            ]
        ];
        foreach ($roles as $role)
        {
            $r = new Role();
            $r->description = $role['description'];
            $r->save();
        }
    }
}
