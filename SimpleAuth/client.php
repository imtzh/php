<?php

require 'main.php';

// $toekn = base64_encode(hash_hmac('sha1', 'www.api.com?index.php&action=index&secret_id=hello&timestamp=1585648888&sign=123456', 'lalala', true));

$url = "www.api.com?index.php&action=index&secret_id=hello&timestamp=1585648888&token=r16X6uQHqfSEUwGFsr0zlQ3qJlA=";

try {
    $main = new Main();
    $main->auth($url);
} catch (Exception $e) {
    echo $e->getMessage();
}