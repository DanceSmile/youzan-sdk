<?php
namespace Dancesmile\Youzan;
use Dancesmile\Foundation\AbstractApi;
use Dancesmile\Foundation\AbstractAccessToken;
use Dancesmile\Foundation\Log;
use Dancesmile\Youzan\Exception;




/**
 * AccessToken
 */
class AccessToken extends AbstractAccessToken
{

    const TOKEN_API = "https://open.youzan.com/oauth/token";


    public $clientId;

    public $grantType;

    public $kdtId;

    public $cahcePrefix = "youzan.cache.";
    public $tokenJsonKey = "access_token";
    public $expiresJsonKey = "expires_in";


/**
 * client_id	String	是	Test client	有赞云颁发给开发者的应用ID
client_secret	String	是	Testclientsecret	有赞云颁发给开发者的应用secret
grant_type	String	是	silent	授与方式（固定为 “silent”）
kdt_id	Number	是	123456	授权给该应用的店铺id，控制台里可查看。详情请参考上一步

 */
   function __construct($client_id, $client_secret, $kdt_id)
   {

      $this->appSecret = $client_secret;
      $this->clientId = $client_id;
      $this->kdtId = $kdt_id;
      $this->appId = $this->clientId . $this->kdtId;
   	
   }

   public function setType($type)
   {
      $this->grantType = $type;
   }

   public function checkTokenResponse($response)
   {

       if ( isset($response['error']) )  {
            throw new \Exception($response['error_description']);
        }
   }


   public function getTokenFromServer()
   {
        $params = ($this->grantType == Youzan::PERSONAL ) ? $this->personalTokenParams() : ""; 
        return $this->getHttp()->asFormParams()->verify(false)->post( self::TOKEN_API , $params)->json();
   }

   public function personalTokenParams()
   {

        return [
            'client_id' => $this->clientId,
            'client_secret' => $this->appSecret,
            'grant_type' => 'silent',
            'kdt_id' => $this->kdtId,
        ];

   }

   
   // public function getToken($force = false)
   // {

   //    if($force == true){

   //      return  $this->cache->save($this->cacheKey,$this->_doToken(),$this->cacheKeyExpire);

   //    }
   //    if( null == $this->cache->fetch($this->cacheKey) ){

   //        $this->cache->save($this->cacheKey,$this->_doToken(),$this->cacheKeyExpire);

   //    }

   //    return $this-> cache->fetch($this->cacheKey);

   // }


   private  function _doToken()
   {
       return $this->getHttp()->asFormParams()->verify(false)->post(self::TOEKN_URL,[
        "client_id" => $this->client_id,
        "client_secret" => $this->client_secret,
        "grant_type" => $this->grant_type,
        "kdt_id" => $this->kdt_id
       ])->json();
   }


}
