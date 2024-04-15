<?php


namespace Api\Websocket;

use Ratchet\MessageInterface;
use Ratchet\WebSocket\MessageComponentInterface;

class SistemaChat implements MessageComponentInterface{


protected $cliente;
     
    public function __construct(){
        $this->cliente = new \SplObjectStorage;
    }

    public function onClose(\Ratchet\ConnectionInterface $conn){
        $this->cliente->detach($conn);
        echo "The User {$conn->resourceId} has Desconected";
    }

    public function onOpen(\Ratchet\ConnectionInterface $conn){
        $this->cliente->attach($conn);
        echo "New Connection {$conn->resourceId}.\n\n ";
    }

    public function onMessage(\Ratchet\ConnectionInterface $from, $msg){
        foreach($this->cliente as $client){
            if($from !== $client){
            $client->send($msg);
            }
        }
        echo "User {$from->resourceId}\n\n ";
    }

    public function onError(\Ratchet\ConnectionInterface $conn, \Exception $e){
        $conn->close();
        echo"". $e->getMessage() ."";
    }

     
}