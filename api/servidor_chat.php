<?php

use Api\Websocket\SistemaChat;
use Ratchet\Http\HttpServer;
use Ratchet\MessageInterface;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

require __DIR__ . "/vendor/autoload.php";

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new SistemaChat()
        )
    ),
    8080
);

$server->run();