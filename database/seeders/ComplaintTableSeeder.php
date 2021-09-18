<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Complaint;

class ComplaintTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c1=new Complaint;
        $c1->nama="Ganti Oli";
        $c1->save();

        $c2=new Complaint;
        $c2->nama="Ganti Ban";
        $c2->save();

        $c3=new Complaint;
        $c3->nama="Ganti Oli";
        $c3->save();

        $c4=new Complaint;
        $c4->nama="Tune Up";
        $c4->save();

        $c5=new Complaint;
        $c5->nama="Kampas Rem";
        $c5->save();

        $c6=new Complaint;
        $c6->nama="Ganti Spare part";
        $c6->save();
    }
}
