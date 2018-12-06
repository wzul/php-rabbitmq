<?php
require 'vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('hello3', false, false, false, false);

echo " [*] Waiting for messages. To exit press CTRL+C\n";

$callback = function ($msg) {
    sleep(2);
    echo ' [x] Received ', $msg->body, "\n";
};

$channel->basic_consume('hello3', '', false, true, false, false, $callback);

while (count($channel->callbacks)) {
    $channel->wait();
}
