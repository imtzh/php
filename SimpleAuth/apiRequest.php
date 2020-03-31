<?php
class ApiRequest
{
    private $secret_id;
    private $timestamp;
    private $base_url;
    private $token;

    public function parseUrl($url)
    {
        // 省略解析url各参数的操作
        $this->secret_id = 'hello';
        $this->timestamp = 1585648888;
        $this->token = 'r16X6uQHqfSEUwGFsr0zlQ3qJlA=';
        $this->base_url = 'www.api.com?index.php&action=index&secret_id=hello&timestamp=1585648888';
        return $this;
    }
    

    public function getToken()
    {
        return $this->token;
    }
    
    public function getSecretId()
    {
        return $this->secret_id;
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }

    public function getBaseUrl()
    {
        return $this->base_url;
    }
}