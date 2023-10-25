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
        $a1->role = "walikelas";
        $a1->login_time = "2023-10-16 02:07:24";
        $a1->save();

        $a2 = new User;
        $a2->nama = "her";
        $a2->email = "her@her.com";
        $a2->password = bcrypt("123");
        $a2->alamat = "baher";
        $a2->role = "superadmin";
        $a2->login_time = "2023-10-15 02:06:36";
        $a2->save();




        // $defaultRoles = Role::whereIn('nama', ['Guru', 'Santri'])->get();

        // for ($i = 0; $i < 9; $i++) {
        //     $faker = Faker::create();
        //     $fkr = new User();
        //     $fkr->nama = $faker->name();
        //     $fkr->email = $faker->unique()->email();
        //     $fkr->password = bcrypt("321"); // Ganti "password" dengan password yang diinginkan
        //     $fkr->alamat = $faker->address();
        //     $fkr->nisn = $faker->numerify('##########');
        //     $fkr->nuptk = $faker->numerify('################');

        //     // Mengambil data role secara acak dari defaultRoles
        //     $randomRole = $defaultRoles->random();
        //     $fkr->role = $randomRole->nama;
        //     $fkr->save();
        // }

        for ($i = 0; $i < 15; $i++) {
            $faker = Faker::create();
            $fkr = new User();
            $fkr->nama = $faker->name();
            $fkr->email = $faker->unique()->email();
            $fkr->password = bcrypt("321"); // Ganti "password" dengan password yang diinginkan
            $fkr->alamat = $faker->address();
            $fkr->nisn = $faker->numerify('##########');
            // $fkr->nuptk = $faker->numerify('################');

            $fkr->role = 'Santri';
            $fkr->save();
        }

        for ($j = 0; $j < 15; $j++) {
            $faker = Faker::create();
            $fkr = new User();
            $fkr->nama = $faker->name();
            $fkr->email = $faker->unique()->email();
            $fkr->password = bcrypt("321"); // Ganti "password" dengan password yang diinginkan
            $fkr->alamat = $faker->address();
            // $fkr->nisn = $faker->numerify('##########');
            $fkr->nuptk = $faker->numerify('################');

            $fkr->role = 'Guru';
            $fkr->save();
        }

    }
}
