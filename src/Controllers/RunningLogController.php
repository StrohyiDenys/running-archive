<?php

namespace controllers;

use Core\Controller;
use Core\Response;
class RunningLogController extends Controller
{
    public function __construct(private UserRepository $users)
    {

    }
    public function index(){
        $this->jsonResponse($users->FindAll())->send(); //transform array with users to json and send it to the client
    }
}