<?php

namespace App\Traits;

trait HttpClient
{

    public function performRequest($method, $requestUrl,  $formParams = [],  $headers = [])
    {
        $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = "Authorization: {$this->secret}";


        $ch = curl_init();

        if ($method == 'GET' || $method == 'get') {

            $formParams = is_array($formParams) ? '?'. http_build_query($formParams) : '';

            curl_setopt($ch, CURLOPT_URL, $this->baseUri . $requestUrl .  $formParams );
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        } else if ($method == 'POST' || $method == 'post') {
            $headers[] = 'Content-Type: application/json';

            if (is_array($formParams)) {
                $formParams = json_encode($formParams);
            }

            curl_setopt($ch, CURLOPT_URL,  $this->baseUri . $requestUrl);
            curl_setopt($ch, CURLOPT_POST, $method);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $formParams);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        curl_close($ch);
        return $response;
    }


}
