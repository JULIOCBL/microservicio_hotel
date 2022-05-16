<?php

namespace App\Schemas\GetHotelAvail;

use App\Traits\HttpClient;
use Illuminate\Http\Request;

class GetHotelAvailV2RQ
{

    use HttpClient;

    public $baseUri;
    public $secret;


    public function __invoke(Request $request)
    {

        $request = $request->all();

        $this->baseUri =  config('links.sabre.base_uri');
        $this->secret =  config('links.sabre.token');


        $params  = [
            "GetHotelAvailRQ" => [
                "POS" => [
                    "Source" => [
                        "PseudoCityCode" => "0OEK"
                    ]
                ],
                "version" => "4.0.0",
                "SearchCriteria" => [
                    "SortBy" => "TotalRate", // ["TotalRate" ,"DistanceFrom","SabreRating"]
                    "SortOrder" => "DESC", // ["DESC" ,"ASC"]
                    "PageSize" => 10,
                    "TierLabels" => true, // [true , false]
                    "RateDetailsInd" => true, // [true , false]
                    "GeoSearch" => [
                        "GeoRef" => [
                            "Radius" => 200,
                            "UOM" => "MI",
                            "GeoCode" => [
                                "Latitude" => 20.96714,
                                "Longitude" => -89.6237
                            ]
                        ]
                    ],
                    "RateInfoRef" => [
                        "CurrencyCode" => "USD",
                        "BestOnly" => "1", // ["1", "2", "3"]
                        "PrepaidQualifier" => "ExcludePrepaid", // ["IncludePrepaid", "PrepaidOnly","ExcludePrepaid"]
                        "RefundableOnly" => false,
                        "ConvertedRateInfoOnly" => false,
                        "StayDateTimeRange" => [
                            "StartDate" => "2022-06-20",
                            "EndDate" => "2022-06-27"
                        ],
                        "RateRange" => [
                            "Min" => 0.1,
                            "Max" => 10000
                        ],
                        "Rooms" => [
                            "Room" => [
                                [
                                    "Index" => 1,
                                    "Adults" => 1,
                                    "Children" => 1,
                                    "ChildAges" => "5"
                                ]
                            ]
                        ],
                        "RateSource" => "100"
                    ],
                    "HotelPref" => [
                        "HotelName" => "Fiesta"
                    ]
                ]
            ]
        ];


        return   $this->performRequest('POST', '/v4.0.0/get/hotelavail', $params);
    }
}
