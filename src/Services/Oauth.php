<?php
/**
 * Created by PhpStorm.
 * User: siyue
 * Date: 2018/04/26
 * Time: 16:10
 */

namespace Dancesmile\Youzan\Services;


use Dancesmile\Youzan\Http;

class Oauth
{
    const  URL = "https://open.youzan.com/oauth/token";

//client_id	String	是	Test client	有赞云颁发给开发者的应用ID
//client_secret	String	是	Testclientsecret	有赞云颁发给开发者的应用secret
//grant_type	String	是	silent	授与方式（固定为 “silent”）
//kdt_id	Number	是	123456	授权给该应用的店铺id，控制台里可查看。详情请参考上一步 申请接入

//curl -X POST https://open.youzan.com/oauth/token -H
// 'content-type: application/x-www-form-urlencoded' -d
// 'client_id=testclient&client_secret=testclientsecret&grant_type=silent&kdt_id=88888'


    public function getAccess($client_id, $client_server, $grant_type = "silent", $kdt_id){

        $headers = [
            "Content-Type"  => "application/x-www-form-urlencoded"
        ];
        $http = new Http();

        $response = $http->post(self::URL, [
            "json" => 'client_id=testclient&client_secret=testclientsecret&grant_type=silent&kdt_id=88888'
        ]);
        return $response;
    }

}