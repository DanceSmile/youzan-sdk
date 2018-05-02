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



dd($youzan->access_token->token);

