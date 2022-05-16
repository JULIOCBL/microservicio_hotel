<?php

namespace App\Schemas\GetHotelChainInfo;

use App\Traits\HttpClient;
use Illuminate\Http\Request;

class GetHotelChainInfoV1RQ
{
    use HttpClient;

    public $baseUri;
    public $secret;

    public function __invoke(Request $request)
    {
        $this->baseUri =  config('links.sabre.base_uri');
        $this->secret =  config('links.sabre.token');

        $params = [
                "GetHotelChainInfoRQ" => [
                      "version" => "string" 
                   ] 
             ]; 

        return   $this->performRequest('POST', '/v1.0.0/shop/hotels/chain?mode=chain', $params);
    }
}
