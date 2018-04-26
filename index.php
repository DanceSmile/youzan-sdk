<?php 
require 'vendor/autoload.php';

use Dancesmile\Youzan\Youzan;


$config = [
    "app_name" => "dancesmile",
    "app_id" => 40680169,
    "push_url" => "http://www.youyouchina.com/youzan/push_message",
    "client_id" => "a68819d96aee4dc6e8",
    "client_secret" => "209c81ec4ccd4e75db30b731623d59da",
    "kdt_id" => 40680169
];

$youzan = new \Dancesmile\Youzan\Youzan($config);

$client = new \Dancesmile\Youzan\Http();

$response = $client->post("https://www.baidu.com");

var_dump($response);







