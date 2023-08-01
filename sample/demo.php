<?php

use sxqibo\fastexchange\exchange\FastExchange;

require __DIR__ . '/../vendor/autoload.php';

$client = new FastExchange();

var_dump($client->getConvert('CNY', '10', 'USD'));
var_dump($client->getCurrency());
var_dump($client->getSingle('CNY'));
