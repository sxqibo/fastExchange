<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Sxqibo\FastExchange\JisuExchange;

// 需要替换为有效的阿里云市场AppCode
$appCode = '';

try {
    $exchange = new JisuExchange($appCode);
    
    // 货币转换
    $result = $exchange->getConvert('CNY', '10', 'USD');
    print_r($result);
    
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}