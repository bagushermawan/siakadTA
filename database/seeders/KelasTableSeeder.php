<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasTableSeeder extends Seeder
{
    public function run()
    {
        $kelas = [
            ['nama' => '1A'],
            ['nama' => '1B'],
            ['nama' => '2A'],
            ['nama' => '2B'],
            ['nama' => '3A'],
            ['nama' => '3B'],
            ['nama' => '4A'],
            ['nama' => '4B'],
            ['nama' => '5A'],
            ['nama' => '5B'],
            ['nama' => '6A'],
            ['nama' => '6B'],
        ];

        foreach ($kelas as $kelass) {
            Kelas::create($kelass);
        }
    }
}
