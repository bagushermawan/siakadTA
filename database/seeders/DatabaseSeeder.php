<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models;
use App\Models\Ekskul;
use App\Models\TahunAjaran;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(CategoryTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        // $this->call(ComplaintTableSeeder::class);
        // $this->call(TransactionTableSeeder::class);
        // $this->call(ProductTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(MapelTableSeeder::class);
        $this->call(EkskulTableSeeder::class);
        $this->call(TahunAjaranTableSeeder::class);
        $this->call(KelasTableSeeder::class);
        $this->call(PrestasiTableSeeder::class);
        // $this->call(BlogTableSeeder::class);
        // $this->call(AskTableSeeder::class);
    }
}
