<?php
namespace  Dancesmile\Youzan;



use GuzzleHttp\Client;

class Http{

    Protected $client = null;

    public function __construct()
    {
        $this-> client = new Client();

    }
    public function get($fullurl){
        return $this->client->request( "GET", $fullurl);
    }
    public function post($fullurl, $data){
        return $this->client->request("POST",$fullurl);
    }
}