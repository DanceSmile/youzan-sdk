<?php 

use Monolog\Handler\ChromePHPHandler;

require __DIR__."/../vendor/autoload.php";

use Dancesmile\Youzan\Youzan;
use Dancesmile\Foundation\Log;


$youzan = new Youzan([
	"kdt_id" => "40680169",
	"client_id" => "a68819d96aee4dc6e8",
	"client_secret" => "209c81ec4ccd4e75db30b731623d59da",
	"type" => \Dancesmile\Youzan\Youzan::PERSONAL,
	"debug" => true,
	"log" => [
		"name" => "youzan",
		"file" => "./log.log",
		"permission" => 0777,
		"level" => "debug",
		"handler" => new ChromePHPHandler()
	]
]);



$my_params = [
    'qr_name' => '測試',
    'qr_price' => '1',
    'qr_type' => 'QR_TYPE_NOLIMIT',
];

$result = $youzan->request("youzan.pay.qrcode.create",$my_params);

dd($result);





