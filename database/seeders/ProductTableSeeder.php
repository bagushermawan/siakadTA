<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Membuat 6 produk palsu
        for ($i = 0; $i < 6; $i++) {
            $product = new Product();
            $product->nama = ucfirst($faker->word());
            $product->stock = mt_rand(1, 50);
            $product->price = mt_rand(5000, 100000);
            $product->save();

            // Menentukan jumlah kategori untuk produk ini secara acak (0 hingga 3)
            $numCategory = mt_rand(1, 4);

            // Memilih kategori secara acak dan menghubungkannya dengan produk
            $category = Category::inRandomOrder()->limit($numCategory)->get();
            $product->category()->attach($category);
        }
    }
}
