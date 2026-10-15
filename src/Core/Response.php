<?php

namespace Core;

class Response
{
    private $data;
    public function json($data){
        $this->data = json_encode($data, JSON_UNESCAPED_UNICODE);
        return $this;
    }
    public function send(){ //send JSON data to client
        header('Content-Type: application/json; charset=utf-8');
        echo $this->data;
    }
}