<?php 


namespace Dancesmile\Youzan;

use Dancesmile\Foundation\Foundation;
use Dancesmile\Dttp;
use Dancesmile\Foundation\Log;
/**
* 	
*/
class Youzan extends Foundation
{

	protected $providers = [

		ServiceProvider::class

	];



	public function request($methos,$url, $params)
	{




		$params = array_merge($params, [
			"access_token" => $this->access_token->getToken()['access_token']
		]);

		Log::debug("params",$params);


		return Dttp::client([
		])->beforeSending(function($request,$reponse){
		})
		->asFormParams()
		->verify(false)
		->{$methos}($url,$params);

	}



}




