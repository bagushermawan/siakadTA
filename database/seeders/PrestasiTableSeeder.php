<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prestasi;

class PrestasiTableSeeder extends Seeder
{
    public function run()
    {
        $prestasi = [
            ['nama' => 'Juara I'],
            ['nama' => 'Juara Harapan'],
        ];

        foreach ($prestasi as $prestasis) {
            Prestasi::create($prestasis);
        }
    }
}
