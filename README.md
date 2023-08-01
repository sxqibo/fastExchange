# 汇率转换接口

## 接口地址
https://market.console.aliyun.com/imageconsole/index.htm?accounttraceid=71dce6a62238496b8fb20bfd7a68808avinr#/?_k=mg3hsc

## 报错处理

若出现错误如下：
Fatal error: Uncaught GuzzleHttp\Exception\RequestException: cURL error 60: SSL certificate problem: unable to get local issuer certificate (see https://curl.haxx.se/libcurl/… in xxx.php

其原因是由于本地的CURL的SSL证书太旧了，导致不识别此证书。

解决方法
1.从 http://curl.haxx.se/ca/cacert.pem 下载一个最新的证书。然后保存到一个任意目录。
2.然后把catr.pem放到php的bin目录下，然后编辑php.ini，用记事本或者notepad++打开 php.ini文件，大概在1932行。
去掉curl.cainfo前面的注释“;”，然后在后面写上cacert.pem证书的完整路径及文件名，我的如下：
3.curl.cainfo = /Applications/EasySrv/software/php/php-8.2/bin/cacert.pem

