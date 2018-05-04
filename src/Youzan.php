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

	const PERSONAL = 'PERSONAL';
    const PLATFORM = 'PLATFORM';

	protected $providers = [

		ServiceProvider::class,
		\Dancesmile\Youzan\Shop\ShopProvider::class


	];



	public function request($method, $params, $version= '3.0.0')
	{

		 return $this->api->request($method, $params, $version);


	}



}




