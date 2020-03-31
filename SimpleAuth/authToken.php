<?php

class AuthToken
{
    const EXPIRED_TIME = 60;    // 过期时间60秒

    private $create_time;
    private $client_token;

    public function __construct($create_time = null, $client_token = null)
    {
        $this->create_time = $create_time;
        $this->client_token = $client_token;
    }

    // 生成token
    public function generateToken($base_url, $sign)
    {
        $str = $base_url.'&sign='.$sign;
        $server_token = base64_encode(hash_hmac('sha1', $str, 'lalala', true));
        return $server_token;
    }

    // client token是否过期
    public function isExpired()
    {
        if (strtotime('+'.self::EXPIRED_TIME.' seconds', $this->create_time) < time()) {
            return true;
        } else {
            return false;
        }
    }

    public function match($server_token)
    {
        return $this->client_token == $server_token;
    }
}