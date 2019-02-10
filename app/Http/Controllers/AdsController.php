<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AdsController extends Controller
{
    /**
     * @param int $day
     * @return mixed
     * @throws \Exception
     */
    public function adsReport($day)
    {
        $data = DB::select('
            SELECT ads.name,
                     SUM(approveds.amount) profit,
                     SUM(clicks.click_cost) spent,
                     COUNT(distinct requests.id) requests,
                     COUNT(distinct clicks.id) clicks,
                     COUNT(distinct requests.unique_key) unique_users
            FROM 
                (SELECT *
                FROM requests
                WHERE created_at >= DATE(NOW()) - INTERVAL '.$day.' DAY) AS matches
            INNER JOIN ads
                ON matches.ad_id = ads.id
            LEFT JOIN requests
                ON requests.ad_id = ads.id
            LEFT JOIN clicks
                ON clicks.request_id = requests.id
            LEFT JOIN approveds
                ON approveds.click_id = clicks.id
            GROUP BY  ads.name
        ');
        return datatables()->of($data)->toJson();
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function countriesReport()
    {
        $data = DB::select('
            SELECT countries.name,
                     SUM(approveds.amount) profit,
                     SUM(clicks.click_cost) spent,
                     COUNT(distinct ads.id) ads,
                     COUNT(distinct clicks.id) clicks,
                     COUNT(distinct requests.unique_key) unique_users
            FROM 
                countries
            INNER JOIN requests
                ON requests.country_id = countries.id
            LEFT JOIN ads
                ON ads.id = requests.ad_id
            LEFT JOIN clicks
                ON clicks.request_id = requests.id
            LEFT JOIN approveds
                ON approveds.click_id = clicks.id
            GROUP BY  countries.name
        ');
        return datatables()->of($data)->toJson();
    }
}
