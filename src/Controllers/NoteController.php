<?php

namespace controllers;

use Core\Controller;
use Core\Response;
class NoteController extends Controller
{
    public function __construct(private UserRepository $users)
    {

    }
    public function index(){
        $this->jsonResponse($users->FindAll())->send();
    }
}