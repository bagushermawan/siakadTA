<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class BlogFactory extends Factory
{
    public function definition()
    {
        $faker = \Faker\Factory::create();
        return [
            'nama_user' => 'her', // Jika Anda ingin mengisinya dengan nama pengguna yang sebenarnya, Anda bisa menggunakan Faker seperti ini: 'nama_user' => $faker->name,
            'tanggal_post' => now(),
            'judul' => $faker->sentence(1, 3), //1-3 kata
            'isi' => $faker->paragraph(10),
            'gambar' => $faker->imageUrl(400, 300), // Menggunakan imageUrl untuk menghasilkan URL gambar palsu
        ];
    }
}
