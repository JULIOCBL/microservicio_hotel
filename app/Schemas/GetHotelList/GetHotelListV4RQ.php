<?php

namespace App\Schemas\GetHotelList;

use App\Traits\HttpClient;
use Illuminate\Http\Request;

class GetHotelListV4RQ
{

    use HttpClient;

    public $baseUri;
    public $secret;


    public function __invoke(Request $request)
    {

        $request = $request->all();

        $this->baseUri =  config('links.sabre.base_uri');
        $this->secret =  config('links.sabre.token');


        $params = [
            "GetHotelListRQ" => [
                "version" => "4.0.0",
                "HotelRefs" => [
                    "HotelRef" => [
                        [
                            "HotelCode" => "100045046",
                            "CodeContext" => "GLOBAL"
                        ]
                    ]
                ],
                "HotelPref" => [
                    "SecurityFeatureCodes" => [
                        "Inclusive" => false,
                        "SecurityFeatureCode" => [
                            9
                        ]
                    ]
                ],
                "HotelInfoRef" => [
                    "LocationInfo" => false,
                    "Amenities" => false,
                    "PropertyTypeInfo" => false,
                    "PropertyQualityInfo" => false,
                    "SecurityFeatures" => true
                ]
            ]
        ];



        return   $this->performRequest('POST', '/v4.0.0/get/hotellist', $params);
    }
}
