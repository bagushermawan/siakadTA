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
        $r1 = new Product();
        $r1->nama = ucfirst($faker->word());
        $r1->stock = mt_rand(1, 50);
        $r1->price = mt_rand(5000, 100000);
        // $r1->category_id = Category::all()->random()->id;
        $r1->save();
    }
}
