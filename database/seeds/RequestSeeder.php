<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < rand(4000, 5000); $i++) {
            $requestData = [
                rand(1, \DB::table('ads')->count()),
                rand(1, \DB::table('countries')->count()),
                str_random(7),
                str_random(70),
                $faker->dateTimeThisYear,
                now()
            ];
            \DB::insert('insert into requests (ad_id, country_id, user_key, unique_key, created_at, updated_at) values (?, ?, ?, ?, ?, ?)', $requestData);
        }
    }
}
