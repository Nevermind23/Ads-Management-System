<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ApprovedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < rand(100, 900); $i++) {
            $approvedData = [
                rand(1, \DB::table('clicks')->count()),
                rand(500, 20000)/100,
                $faker->dateTimeThisYear,
                now()
            ];
            \DB::insert('insert into approveds (click_id, amount, created_at, updated_at) values (?, ?, ?, ?)', $approvedData);
        }
    }
}
