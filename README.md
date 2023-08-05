# 汇率转换接口

## 接口地址
https://market.aliyun.com/products/57000002/cmapi011221.html

# 使用方法

引入
```shell
composer require sxqibo/fast-exchange
```

实例化
```php
$config = [
    'appcode' => '你的 appcode',
];

$weather = new FastExchange($config);
```

## 支持接口

1. getConvert: 汇率转换接口
2. getCurrency: 所有货币查询接口
3. getSingle: 单个货币查询接口

## 报错处理

若出现错误如下：
Fatal error: Uncaught GuzzleHttp\Exception\RequestException: cURL error 60: SSL certificate problem: unable to get local issuer certificate (see https://curl.haxx.se/libcurl/… in xxx.php

其原因是由于本地的CURL的SSL证书太旧了，导致不识别此证书。

解决方法
1.从 http://curl.haxx.se/ca/cacert.pem 下载一个最新的证书。然后保存到一个任意目录。
2.然后把catr.pem放到php的bin目录下，然后编辑php.ini，用记事本或者notepad++打开 php.ini文件，大概在1932行。
去掉curl.cainfo前面的注释“;”，然后在后面写上cacert.pem证书的完整路径及文件名，我的如下：
3.curl.cainfo = /Applications/EasySrv/software/php/php-8.2/bin/cacert.pem

