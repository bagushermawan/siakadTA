<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c1=new Category;
        $c1->nama="Honda";
        $c1->save();

        $c2=new Category;
        $c2->nama="Yamaha";
        $c2->save();

        $c3=new Category;
        $c3->nama="Suzuki";
        $c3->save();

        $c4=new Category;
        $c4->nama="Kawasaki";
        $c4->save();

        $c5 = new Category;
        $c5->nama = "Toyota";
        $c5->save();

    }
}
