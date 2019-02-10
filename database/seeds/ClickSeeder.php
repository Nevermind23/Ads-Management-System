<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClickSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $totalRequests = \DB::table('requests')->count();
        for ($i=0; $i < rand(6000, 7000); $i++) {
            $clickData = [
                rand(rand(1, round($totalRequests/3)), rand(round($totalRequests/3), $totalRequests)),
                'banner-'.str_random(5).'-'.rand(1, 5),
                rand(1,500)/100,
                $faker->dateTimeThisYear,
                now()
            ];
            \DB::insert('insert into clicks (request_id, banner_name, click_cost, created_at, updated_at) values (?, ?, ?, ?, ?)', $clickData);
        }
    }
}
