<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a1 = new User;
        $a1->nama = "baher";
        $a1->email = "baher@her.com";
        $a1->password = bcrypt("123");
        $a1->alamat = "baher";
        $a1->role = "Admin";
        $a1->save();

        $a2 = new User;
        $a2->nama = "her";
        $a2->email = "her@her.com";
        $a2->password = bcrypt("123");
        $a2->alamat = "baher";
        $a2->role = "Admin";
        $a2->save();




        $defaultRole = Role::where('nama', 'Mekanik')->first();
        // Create 6 user dummy
        for ($i = 0; $i < 6; $i++) {
            $faker = Faker::create();
            $roles = Role::all();
            $fkr = new User();
            $fkr->nama = $faker->name();
            $fkr->email = $faker->unique()->email();
            $fkr->password = bcrypt("321"); // Ganti "password" dengan password yang diinginkan
            $fkr->alamat = $faker->address();
            // $fkr->role = $faker->randomElement(['Admin', 'member']); // Ganti 'admin' dan 'member' dengan role yang diinginkan

            //Take data role random dari tabel Role
            // Mengambil data role secara acak dari tabel roles
            $randomRole = Role::inRandomOrder()->first();
            $fkr->role = $randomRole ? $randomRole->nama : $defaultRole->nama;

            $fkr->save();
        }
    }
}
