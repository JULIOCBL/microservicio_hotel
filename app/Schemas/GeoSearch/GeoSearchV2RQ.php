<?php

namespace App\Schemas\GeoSearch;

use App\Traits\HttpClient;
use Illuminate\Http\Request;

class GeoSearchV2RQ {

    use HttpClient;

    public $baseUri;
    public $secret;


    public function __invoke(Request $request)
    {

        $request = $request->all();

        $this->baseUri =  config('links.sabre.base_uri');
        $this->secret =  config('links.sabre.token');

        $params = [
            "GeoSearchRQ" => [
                  "version" => "1", 
                  "GeoRef" => [
                     "Category" => "HOTEL", 
                     "Radius" => 100, 
                     "UOM" => "MI", 
                     "MaxResults" => 600, 
                     "OffSet" => 1, 
                     "GeoCode" => [
                        "Latitude" => 19.844266, 
                        "Longitude" => -90.536211 
                     ] 
                  ] 
               ] 
         ]; 
          

        return   $this->performRequest('POST', '/v2/geo/search', $params);
    }
}
