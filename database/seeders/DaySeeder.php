<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Day;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Day::create([
            'name' => 'Senin',
        ]);
        Day::create([
            'name' => 'Selasa',
        ]);
        Day::create([
            'name' => 'Rabu',
        ]);
        Day::create([
            'name' => 'Kamis',
        ]);
        Day::create([
            'name' => 'Jummat',
        ]);
        Day::create([
            'name' => 'Sabtu',
        ]);
        Day::create([
            'name' => 'Minggu',
        ]);
    }
}
