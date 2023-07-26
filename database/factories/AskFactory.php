<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\Ask;

class AskFactory extends Factory
{
    public function definition()
    {
        $faker = \Faker\Factory::create();
        return [
            'tanggal_tanya' => now(),
            'judul' => $faker->randomElement(['Tanya Harga', 'Konsul dong']),
            'isi' => $faker->paragraph(1),
        ];
    }
}
