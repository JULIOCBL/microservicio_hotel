<?php

namespace App\Schemas\GetHotelDetails;

use App\Traits\HttpClient;
use Illuminate\Http\Request;

class GetHotelDetailsV4RQ
{
    use HttpClient;

    public $baseUri;
    public $secret;

    public function __invoke(Request $request)
    {
        $this->baseUri =  config('links.sabre.base_uri');
        $this->secret =  config('links.sabre.token');
        
        $params = [
            "GetHotelDetailsRQ" => [
                "version" => "3.0.0",
                "POS" => [
                    "Source" => [
                        "PseudoCityCode" => "0OEK"
                    ]
                ],
                "SearchCriteria" => [
                    "HotelRefs" => [
                        "HotelRef" => [
                            "HotelCode" => "100045046",
                            "CodeContext" => "GLOBAL"
                        ]
                    ],
                    "RateInfoRef" => [
                        "CurrencyCode" => "USD",
                        "ShowNegotiatedRatesFirst" => false,
                        "PrepaidQualifier" => "ExcludePrepaid",
                        "StayDateTimeRange" => [
                            "StartDate" => "2022-06-20",
                            "EndDate" => "2022-06-27"
                        ],
                        "Rooms" => [
                            "Room" => [
                                [
                                    "Index" => 1,
                                    "Adults" => 1,
                                    "Children" => 1,
                                    "ChildAges" => "1"
                                ]
                            ]
                        ],
                        "RatePlanCandidates" => [
                            "ExactMatchOnly" => false,
                            "RatePlanCandidate" => [
                                [
                                    "RatePlanType" => "11"
                                ]
                            ]
                        ],
                        "RateSource" => "113"
                    ],
                    "HotelContentRef" => [
                        "DescriptiveInfoRef" => [
                            "PropertyInfo" => false,
                            "LocationInfo" => false,
                            "Amenities" => false,
                            "Descriptions" => [
                                "Description" => [
                                    [
                                        "Type" => "ShortDescription"
                                    ],
                                    [
                                        "Type" => "Dining"
                                    ],
                                    [
                                        "Type" => "Facilities"
                                    ],
                                    [
                                        "Type" => "Recreation"
                                    ],
                                    [
                                        "Type" => "Services"
                                    ],
                                    [
                                        "Type" => "Attractions"
                                    ],
                                    [
                                        "Type" => "CancellationPolicy"
                                    ],
                                    [
                                        "Type" => "DepositPolicy"
                                    ],
                                    [
                                        "Type" => "Directions"
                                    ],
                                    [
                                        "Type" => "Policies"
                                    ],
                                    [
                                        "Type" => "SafetyInfo"
                                    ],
                                    [
                                        "Type" => "TransportationInfo"
                                    ],
                                    [
                                        "Type" => "GuaranteePolicy"
                                    ]
                                ]
                            ],
                            "SecurityFeatures" => true
                        ],
                        "MediaRef" => [
                            "MaxItems" => "ALL",
                            "MediaTypes" => [
                                "Images" => [
                                    "Image" => [
                                        [
                                            "Type" => "ORIGINAL"
                                        ]
                                    ]
                                ],
                                "PanoramicMedias" => [
                                    "PanoramicMedia" => [
                                        [
                                            "Type" => "HD360"
                                        ]
                                    ]
                                ],
                                "Videos" => [
                                    "Video" => [
                                        [
                                            "Type" => "VIDEO360"
                                        ]
                                    ]
                                ]
                            ],
                            "AdditionalInfo" => [
                                "Info" => [
                                    [
                                        "Type" => "CAPTION",
                                        "value" => true
                                    ]
                                ]
                            ],
                            "Languages" => [
                                "Language" => [
                                    [
                                        "Code" => "EN"
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];


        return   $this->performRequest('POST', '/v3.0.0/get/hoteldetails', $params);
    }
}
