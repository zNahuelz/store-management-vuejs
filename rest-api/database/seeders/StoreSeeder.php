<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Store::create([
            'name' => 'MAIN STORE',
            'ruc' => '25689789654',
            'address' => 'AV. ESTRELLA 505',
            'phone' => '996514332',
        ]);
    }
}
