<?php
require 'apiRequest.php';
require 'authToken.php';
require 'storage/mysqlSignStorage.php';

class Main
{
    public function auth($url)
    {
        $req = (new ApiRequest)->parseUrl($url);
        
        // 获取client token
        $client_token = (new AuthToken($req->getTimestamp(), $req->getToken()));

        // client token是否过期
        if ($client_token->isExpired()) {
            throw new Exception('token过期');
        }
        
        // 获取签名
        $sign = (new MySqlSignStorage)->getSignBySecretId($req->getSecretId());


        // 获取server token
        $server_token = $client_token->generateToken($req->getBaseUrl(), $sign);

        // 比较client token和server token
        if (!$client_token->match($server_token)) {
            throw new Exception('token无效');
        }

        echo '认证通过';
    }
}