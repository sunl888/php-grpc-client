<?php

use Proto\Client;
use Proto\HelloRequest;

require __DIR__ . '/vendor/autoload.php';

//用于连接 服务端
try {
    $client = new Client('127.0.0.1:50052', [
        'credentials' => Grpc\ChannelCredentials::createInsecure()
    ]);
} catch (Exception $e) {
}

//实例化 TestRequest 请求类
$request = new HelloRequest();
$request->setName("sunlong");

//调用远程服务
$get = $client->SayHello($request)->wait();

//返回数组
//$reply 是 HelloReply 对象
//$status 是数组
list($reply, $status) = $get;

if ($status->code == 14) {
    throw new Exception("error:" . $status->details);
}
$getdata = $reply->getMessage();
print_r($getdata);