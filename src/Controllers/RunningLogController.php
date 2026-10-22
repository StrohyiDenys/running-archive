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
    //show store destroy update
    public function show($id){
        //todo
    }
    public function store(){
        //todo
    }
    public function update($id){
        //todo
    }
    public function destroy(){
        //todo
    }
}