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

    public $client_id;

    public $client_secret;

    public $grant_type;

    public $kdt_id;

    public $cache;

    public $cacheKey;

    public $cacheKeyExpire;

/**
 * client_id	String	是	Test client	有赞云颁发给开发者的应用ID
client_secret	String	是	Testclientsecret	有赞云颁发给开发者的应用secret
grant_type	String	是	silent	授与方式（固定为 “silent”）
kdt_id	Number	是	123456	授权给该应用的店铺id，控制台里可查看。详情请参考上一步

 */
   function __construct($client_id, $client_secret, $grant_type, $kdt_id, $cache)
   {

      $this->client_secret = $client_secret;

      $this->client_id = $client_id;

      $this->grant_type = $grant_type;

      $this->kdt_id = $kdt_id;

      $this->cache = $cache;
      
      $this->cacheKey = "youzan_token";

     	$this->cacheKeyExpire = 604800;
   	
   }

   public function getToken($force = false)
   {

      if($force == true){

        return  $this->cache->save($this->cacheKey,$this->_doToken(),$this->cacheKeyExpire);

      }
      if( null == $this->cache->fetch($this->cacheKey) ){

          $this->cache->save($this->cacheKey,$this->_doToken(),$this->cacheKeyExpire);

      }

      return $this-> cache->fetch($this->cacheKey);

   }


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
