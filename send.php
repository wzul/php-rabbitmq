<?php
require 'vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

for ($i=1; $i<=10; $i++) {
    $data = "Wan {$i}";
    $msg = new AMQPMessage($data);
    $channel->basic_publish($msg, '', 'hello2');
}
echo ' Done ';
