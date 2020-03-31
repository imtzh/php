<?php
interface SignStorage
{
    public function getSignBySecretId($secret_id);
}