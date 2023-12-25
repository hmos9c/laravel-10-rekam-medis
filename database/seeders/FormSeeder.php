<?php

namespace Database\Seeders;

use App\Models\Form;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Form::create([
            'name' => 'Obat Cair',
            'description' => 'Obat ini terdiri dari zat aktif yang dilarutkan dalam cairan sehingga lebih mudah untuk diminum sekaligus terserap oleh tubuh.'
        ]);
        Form::create([
            'name' => 'Tablet',
            'description' => 'Sediaan obat ini tersusun atas zat aktif yang dikombinasikan dengan bahan-bahan tertentu dan kemudian dipadatkan. Obat tablet banyak tersedia dalam bentuk bulat atau oval.'
        ]);
        Form::create([
            'name' => 'Kapsul',
            'description' => 'Obat kapsul, zat aktif dalam bentuk bubuk akan disimpan dalam tabung plastik kecil yang terbuat dari bahan yang mudah larut secara perlahan.'
        ]);
        Form::create([
            'name' => 'Obat oles',
            'description' => 'Obat ini juga dikenal dengan obat topikal atau obat luar karena digunakan langsung pada kulit.'
        ]);
        Form::create([
            'name' => 'Supositoria',
            'description' => 'Memiliki bentuk menyerupai peluru, obat supositoria digunakan dengan cara dimasukkan ke lubang anus. Oleh karena itu, jenis obat ini biasanya digunakan untuk obat sembelit (pencahar).'
        ]);
        Form::create([
            'name' => 'Obat Tetes',
            'description' => 'Beberapa jenis obat akan bekerja dengan lebih efektif bila langsung diberikan pada bagian tubuh yang bermasalah, salah satunya obat tetes.'
        ]);
    }
}
