<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new \GuzzleHttp\Client();
        $namesRes = $client->get('http://country.io/names.json');
        $namesArray = json_decode($namesRes->getBody(), true);
        $countries = array_random($namesArray, rand(5, 10));

        $isoRes = $client->get('http://country.io/iso3.json');
        $isoArray = json_decode($isoRes->getBody(), true);

        foreach ($countries as $key => $country) {
            if(strlen($country) <= 30) {
                $countryData = [
                    $country,
                    $isoArray[array_search ($country, $namesArray)],
                    now(),
                    now()
                ];
                \DB::insert('insert into countries (name, iso_code, created_at, updated_at) values (?, ?, ?, ?)', $countryData);
            }
        }
    }
}
