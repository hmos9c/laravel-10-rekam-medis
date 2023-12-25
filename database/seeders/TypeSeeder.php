<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::create([
            'name' => 'Analgesik',
            'description' => 'Fungsi dari obat analgesik adalah untuk meredakan nyeri.'
        ]);
        Type::create([
            'name' => 'Antikoagulan',
            'description' => 'Tipe obat-obatan antikoagulan digunakan untuk mencegah pembekuan darah.'
        ]);
        Type::create([
            'name' => 'Trombolitik',
            'description' => 'Obat trombolitik akan membantu melarutkan penggumpalan darah.'
        ]);
        Type::create([
            'name' => 'Antijamur',
            'description' => 'Jenis obat ini digunakan untuk mengobati infeksi jamur yang umumnya menyerang rambut, kulit, kuku, atau selaput lendir.'
        ]);
        Type::create([
            'name' => 'Antivirus',
            'description' => 'Kelompok obat ini bertugas untuk mengobati infeksi virus dan memberikan perlindungan sementara terhadap serangan virus.'
        ]);
        Type::create([
            'name' => 'Antibiotik',
            'description' => 'Obat antibiotik bertugas untuk melawan infeksi bakteri.'
        ]);
    }
}
