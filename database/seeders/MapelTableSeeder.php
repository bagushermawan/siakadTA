<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mapel;

class MapelTableSeeder extends Seeder
{
    public function run()
    {
        $mapel = [
            ['nama' => 'Pendidikan Pancasila dan Kewarganegaraan', 'kelompok' => 'Kelompok A'],
            ['nama' => 'Matematika', 'kelompok' => 'Kelompok A'],
            ['nama' => 'Bahasa Indonesia', 'kelompok' => 'Kelompok A'],
            ['nama' => 'Ilmu Pengetahuan Alam', 'kelompok' => 'Kelompok A'],
            ['nama' => 'Ilmu Pengetahuan Sosial', 'kelompok' => 'Kelompok A'],
            ['nama' => 'Bahasa Arab', 'kelompok' => 'Kelompok A'],
            ['nama' => 'Bahasa Inggris', 'kelompok' => 'Kelompok A'],
            ['nama' => "Al-Qur'an Hadits", 'kelompok' => 'Kelompok A'],
            ['nama' => 'Akidah Akhlah', 'kelompok' => 'Kelompok A'],
            ['nama' => 'Fiqih', 'kelompok' => 'Kelompok A'],
            ['nama' => 'Sejarah Kebudayaan Islam', 'kelompok' => 'Kelompok A'],
            ['nama' => 'Penjaskes', 'kelompok' => 'Kelompok B'],
            ['nama' => 'Seni Budaya dan Prakarya', 'kelompok' => 'Kelompok B'],
            ['nama' => 'Bahasa Jawa', 'kelompok' => 'Muatan Lokal'],
            ['nama' => 'Bahasa Inggris', 'kelompok' => 'Muatan Lokal'],
            ['nama' => 'tes1'],
            ['nama' => 'tes2'],
            ['nama' => 'tes3'],
            ['nama' => 'tes4'],
            ['nama' => 'tes5'],
            ['nama' => 'tes6'],
            ['nama' => 'tes7'],
            ['nama' => 'tes8'],
            ['nama' => 'tes9'],
        ];

        foreach ($mapel as $mapels) {
            Mapel::create($mapels);
        }
    }
}
