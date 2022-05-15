<?php

namespace App\Traits;

trait HttpClient
{

    public function performRequest($method, $requestUrl,  $formParams = '',  $headers = [])
    {
        $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = 'Content-Type: application/json';

        if (isset($this->secret)) {
            $headers[] = "Authorization: Bearer {$this->secret}";
        }

        $ch = curl_init();

        if ($method == 'POST') {
            curl_setopt($ch, CURLOPT_URL,  $this->baseUri . $requestUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, $method);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $formParams);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $response = curl_exec($ch);
        } else if ($method == 'GET') {
            curl_setopt($ch, CURLOPT_URL, $this->baseUri . $requestUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $response = curl_exec($ch);
        }
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $response;
    }
}
