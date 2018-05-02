<?php
namespace Dancesmile\Youzan;
use Dancesmile\Foundation\AbstractApi;



/**
 * AccessToken
 */
class AccessToken extends AbstractApi
{

    const TOEKN_URL = "https://open.youzan.com/oauth/token";

    public $token;

/**
 * client_id	String	是	Test client	有赞云颁发给开发者的应用ID
client_secret	String	是	Testclientsecret	有赞云颁发给开发者的应用secret
grant_type	String	是	silent	授与方式（固定为 “silent”）
kdt_id	Number	是	123456	授权给该应用的店铺id，控制台里可查看。详情请参考上一步

 */
   function __construct($client_id, $client_secret, $grant_type, $kdt_id)
   {

   	 $client = $this->getHttp()->asFormParams()->post(self::TOEKN_URL,[
   	 	"client_id" => $client_id,
   	 	"client_secret" => $client_secret,
   	 	"grant_type" => $grant_type,
   	 	"kdt_id" => $kdt_id
   	 ]);

   	 $this->token = $client->body();

   	
   }


}
