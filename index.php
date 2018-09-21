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
    die($e->getMessage());
}


$request = new HelloRequest();
$request->setName("sunlong");

//调用远程服务,返回数组
$response = $client->SayHello($request)->wait();
list($reply, $status) = $response;
/**
 * @var stdClass $status
 * @var \Proto\HelloReply $reply
 */
if ($status->code == Grpc\STATUS_UNAVAILABLE) {
    die("error:" . $status->details . PHP_EOL);
}
$data = $reply->getMessage();
print_r($data);