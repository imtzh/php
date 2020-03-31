<?php
require 'signStorage.php';

class MySqlSignStorage implements SignStorage
{
    public function getSignBySecretId($secret_id)
    {
        // 省略数据库操作 直接返回
        return '123456';
    }
}