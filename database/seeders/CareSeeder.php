<?php

namespace Database\Seeders;

use App\Models\Care;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
