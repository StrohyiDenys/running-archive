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
    //show store destroy update
    public function show(){
        //todo
    }
    public function store(){
        //todo
    }
    public function update(){
        //todo
    }
    public function destroy(){
        //todo
    }
}