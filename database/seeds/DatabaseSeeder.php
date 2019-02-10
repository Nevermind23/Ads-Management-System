<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(AdSeeder::class);
        $this->call(RequestSeeder::class);
        $this->call(ClickSeeder::class);
        $this->call(ApprovedSeeder::class);
    }
}
