<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $providers = [];
        for($i=0; $i < rand(5, 20); $i++) {
            $providers[] = $faker->unique()->company;
        }


        for ($i = 0; $i < rand(1000, 2000); $i++) {
            $adData = [
                rand(1, 100),
                $faker->word.'-ads-'.str_random(5).'-'.rand(0, 10),
                $providers[rand(1, (count($providers)-1))],
                $faker->dateTimeThisYear,
                now()
            ];
            \DB::insert('insert into ads (user_id, name, provider, created_at, updated_at) values (?, ?, ?, ?, ?)', $adData);
        }
    }
}
