<?php 

require __DIR__."/../vendor/autoload.php";

use Dancesmile\Youzan\Youzan;
use Dancesmile\Foundation\Log;

$youzan = new Youzan([
	"app_name" => "dancesmile",
	"kdt_id" => "40680169",
	"client_id" => "a68819d96aee4dc6e8",
	"client_secret" => "209c81ec4ccd4e75db30b731623d59da",
	"debug" => true,
	"log" => [
		"name" => "youzan",
		"file" => "./log.log",
		"permission" => 0777,
		"level" => "debug"
	]

]);

Log::debug($youzan->request("post", "https://open.youzan.com/api/oauthentry/youzan.pay.qrcode/3.0.0/create" , [
    'qr_name' => '測試',
    'qr_price' => '1',
    'qr_type' => 'QR_TYPE_NOLIMIT',
])->body());



dd($youzan->access_token->getToken());

