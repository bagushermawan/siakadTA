<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ask;

class AskTableSeeder extends Seeder
{
    public function run()
    {
        Ask::factory(8)->create();
    }
}
