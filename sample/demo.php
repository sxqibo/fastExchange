<?php

use sxqibo\fastexchange\exchange\FastExchange;

require __DIR__ . '/../vendor/autoload.php';

$config = [
    'appcode' => ''
];

$client = new FastExchange($config);

var_dump($client->getConvert('CNY', '10', 'USD'));
var_dump($client->getCurrency());
var_dump($client->getSingle('CNY'));
