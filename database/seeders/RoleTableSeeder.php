<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1=new Role;
        $r1->nama="Admin";
        $r1->save();

        $r2=new Role;
        $r2->nama="Mekanik";
        $r2->save();

        $r3=new Role;
        $r3->nama="User";
        $r3->save();
    }
}
