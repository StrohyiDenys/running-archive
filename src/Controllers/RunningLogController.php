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
        $result = $this->logRepository->getById($id);
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
        return $this->jsonResponse($result)->send(201);
    }
    public function update(){
        $httpBody = file_get_contents('php://input');
        $row = json_decode($httpBody, true);
        $result = $this->logRepository->update(
            $row['id'],
            $row['user_id'] ?? null,
            $row['distance'] ?? null,
            $row['time'] ?? null,
            $row['date'] ?? null,
            $row['notes'] ?? null,
        );
        return $this->jsonResponse($result)->send();
    }
    public function destroy($id){
       $result = $this->logRepository->delete($id);
       return $this->jsonResponse($result)->send();
    }
}