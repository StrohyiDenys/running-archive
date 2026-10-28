<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Repositories\RunningLogRepository;

class RunningLogController extends Controller
{
    public function __construct(private RunningLogRepository $logRepository)
    {

    }
    public function index(){
        $result = $this->logRepository->getAll(); //transform array with users to json and send it to the client
        return $this->jsonResponse($result)->send();
    }
    public function show($id){
        $result = $this->logRepository->get();
        return $this->jsonResponse($result)->send();
    }
    public function store(){
        // need to add POST data to create
        // Maybe need to use DTO or put raw data from POST
        $result = $this->logRepository->create(
            $_POST['user_id'] ?? null,
            $_POST['distance'] ?? null,
            $_POST['time'] ?? null,
            $_POST['date'] ?? null,
            $_POST['notes'] ?? null,
        );
        return $this->jsonResponse($result)->send();
    }
    public function update($id){
        //todo
    }
    public function destroy($id){
        //todo
    }
}