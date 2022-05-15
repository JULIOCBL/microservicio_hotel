<?php

namespace App\Schemas\GeoAutocomplete;

use App\Traits\HttpClient;
use Illuminate\Http\Request;

class GeoAutocompleteV2RQ
{

    use HttpClient;

    public $baseUri;
    public $secret;


    public function __invoke(Request $request)
    {

        $request = $request->all();

        $this->baseUri =  config('links.sabre.base_uri');
        $this->secret =  config('links.sabre.token');

        return  ['SDCS' =>config('links.sabre.base_uri'), 'SDCSSD' =>   config('links.sabre.token')] /*  $this->performRequest('GET', '/v2/geo/autocomplete', $request) */ ;
    }
}
