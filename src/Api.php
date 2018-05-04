<?php 
namespace  Dancesmile\Youzan;

use Dancesmile\Foundation\AbstractApi;

use Dancesmile\Foundation\AbstractAccesstoken;
use Dancesmile\Youzan\Exceptions\YouzanException;
use Dancesmile\Foundation\Log;
/**
* 	
*/
class Api extends AbstractApi
{
	
	public $accessToken;
	const API = 'https://open.youzan.com/api/oauthentry/';
	function __construct(AbstractAccesstoken $access_token )
	{
		$this->accessToken = $access_token;
	}


	public function request($method, $params = [], $version = '3.0.0')
	{

		$url = $this->url($method, $version);
        $http = $this->getHttp();
        $params['access_token'] = $this->accessToken->getToken();
        $response = $http->asFormParams()->verify(false)->post($url, $params);
        $result = json_decode(strval($response->getBody()), true);
        if (isset($result['error_response'])) {
            throw new YouzanException($result['error_response']['msg'], $result['error_response']['code']);
        }
        return $result['response'];
	}

	 private function url($method, $version)
    {
        $methodArray = explode('.', $method);
        $method = '/' . $version . '/' . $methodArray[count($methodArray) - 1];
        array_pop($methodArray);
        Log::debug("api_url",[self::API . implode('.', $methodArray) . $method]);
        return self::API . implode('.', $methodArray) . $method;
    }

}

