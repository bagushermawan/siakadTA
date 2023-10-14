<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ekskul;

class EkskulTableSeeder extends Seeder
{
    public function run()
    {
        $ekskul = [
            ['nama' => 'Pramuka'],
            ['nama' => 'Tari'],
            ['nama' => 'Sepak Bola'],
            ['nama' => 'Pencak Silat'],
            ['nama' => 'Drum Band'],
            ['nama' => 'Tenis Meja'],
        ];

        foreach ($ekskul as $ekslus) {
            Ekskul::create($ekslus);
        }
    }
}
