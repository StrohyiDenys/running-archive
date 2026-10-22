<?php

namespace App\Core;

class Controller
{
    protected function jsonResponse($data){
        $response = new Response;
        return $response->json($data);
    }
}