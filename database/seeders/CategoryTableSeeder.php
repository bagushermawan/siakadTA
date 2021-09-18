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
        $c1->name="Honda";
        $c1->save();

        $c2=new Category;
        $c2->name="Yamaha";
        $c2->save();

        $c3=new Category;
        $c3->name="Suzuki";
        $c3->save();

        $c4=new Category;
        $c4->name="Kawasaki";
        $c4->save();

        $c5=new Category;
        $c5->name="Kawasaki";
        $c5->save();
    }
}
