<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use Faker\Factory as Faker;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $faker = Faker::create();
            $b = new Transaction();
            $b->nama = ucfirst($faker->word());
            $b->merek = ucfirst($faker->word());
            $b->platnomer = strtoupper($faker->bothify('?-####-??'));
            $b->status = $faker->randomElement(['Selesai', 'Proses']);
            $a = 'AUIEOaiueo';
            $b->kode = str_replace(' ', '', $b->nama) . substr(str_shuffle($a), 0, 5) . str_replace(' ', '', $b->merek);

            $b->save();
        }
    }
}
