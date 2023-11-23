<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Care;
use Illuminate\Database\Seeder;

class CareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Care::create([
            'care' => 'Rawat Inap'
        ]);
        Care::create([
            'care' => 'Rawat Jalan'
        ]);
    }
}
