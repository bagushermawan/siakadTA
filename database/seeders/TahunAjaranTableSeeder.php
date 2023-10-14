<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TahunAjaran;

class TahunAjaranTableSeeder extends Seeder
{
    public function run()
    {
        $tahunajaran = [
            ['nama' => '2020/2021'],
            ['nama' => '2021/2022'],
            ['nama' => '2022/2023'],
        ];

        foreach ($tahunajaran as $tahunajarans) {
            TahunAjaran::create($tahunajarans);
        }
    }
}
