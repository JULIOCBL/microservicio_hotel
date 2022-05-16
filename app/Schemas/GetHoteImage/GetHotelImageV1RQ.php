<?php

namespace App\Schemas\GetHoteImage;

use App\Traits\HttpClient;
use Illuminate\Http\Request;

class GetHotelImageV1RQ
{
    use HttpClient;

    public $baseUri;
    public $secret;

    public function __invoke(Request $request)
    {
        $this->baseUri =  config('links.sabre.base_uri');
        $this->secret =  config('links.sabre.token');


        $params = [
            "GetHotelImageRQ" => [
                  "ImageRef" => [
                     "CategoryCode" => 3, // min:1 , max:3
                     "LanguageCode" => "EN", 
                     "Type" => "ORIGINAL" //[ ORIGINAL, MEDIUM, LARGE, THUMBNAIL, SMALL ]
                  ], 
                  "HotelRefs" => [
                        "HotelRef" => [
                           [
                              "HotelCode" => $request->txt_hotel_code, // "100045046"
                              "CodeContext" => $request->txt_code_context // "GLOBAL"
                           ] 
                        ] 
                     ] 
               ] 
         ]; 
          

        return   $this->performRequest('POST', '/v1.0.0/shop/hotels/image?mode=image', $params);
    }
}
