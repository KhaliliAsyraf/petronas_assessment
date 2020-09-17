<?php

namespace App\Helpers;

class CurlFunc
{
    public static function curlFunc($title)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.github.com/search/repositories?q=".$title."&page=1&per_page=20",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "User-Agent: KhaliliAsyraf",
                "Content-Type: application/json"
              ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}