<?php

namespace App\Core;

class Response
{
    private $data;
    public function json($data){
        $this->data = json_encode($data, JSON_UNESCAPED_UNICODE);
        return $this;
    }
    public function send(?int $statusCode = 0){ //send JSON data to client
        header('Content-Type: application/json; charset=utf-8');
        http_response_code($statusCode);
        echo $this->data;
    }
}