<?php 

namespace App\Helpers;

class BrgyAPI {

     
    public static function getBrgyList($municipality_name)
    {
        $api = 'https://raw.githubusercontent.com/flores-jacob/philippine-regions-provinces-cities-municipalities-barangays/master/philippine_provinces_cities_municipalities_and_barangays_2019v2.json';

        $client = new \GuzzleHttp\Client();
        $response = $client->get($api);
        $obj = json_decode($response->getBody(), true);

        return $obj['4A']['province_list']['BATANGAS']['municipality_list'][$municipality_name];
    }
}

