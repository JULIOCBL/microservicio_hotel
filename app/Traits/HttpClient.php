<?php

namespace App\Traits;

trait HttpClient
{

    public function performRequest($method, $requestUrl,  $formParams = [],  $headers = [])
    {
       /*  $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = "Authorization: {$this->secret}";


        $ch = curl_init();

        if ($method == 'GET' || $method == 'get') {
            curl_setopt($ch, CURLOPT_URL, $this->baseUri . $requestUrl . $this->url($formParams));
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        } else if ($method == 'POST' || $method == 'post') {
            $headers[] = 'Content-Type: application/json';
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

        curl_close($ch); */
        return ['URL' =>  $this->baseUri . $requestUrl ];
    }


    public  function url(array $datos)
    {
        $request = '';

        if (is_array($datos)) {
            $postArray = array();
            reset($datos);
            while (list($k, $v) = each($datos)) {
                $postArray[] = urlencode($k) . '=' . urlencode($v);
            }

            $request = implode('&', $postArray);
        }

        if ($request == '') {
            return $request;
        } else {
            return '?' . $request;
        }
    }
}
