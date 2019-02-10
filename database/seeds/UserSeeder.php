<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            $userData = [
                $faker->name,
                $faker->unique()->safeEmail,
                now(),
                bcrypt($faker->password),
                str_random(10),
                $faker->dateTimeThisYear,
                now()
            ];
            \DB::insert('insert into users (name, email, email_verified_at, password, remember_token, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?)', $userData);
        }
    }
}
