<?php

namespace Proto;

use Grpc\BaseStub;

class Client extends BaseStub
{

    public function SayHello(HelloRequest $request, $metadata = [], $options = [])
    {
        return $this->_simpleRequest("proto.Hello/SayHello",
            $request,
            ['\Proto\HelloReply', 'decode'],
            $metadata, $options);
    }
}