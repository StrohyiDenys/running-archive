<?php

namespace Models\Repositories;

class RunningLogRepository
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function getAll() : RunningLog
    {
        // fetchAll(statement)
        // transform array to array of RunningLog objects
        // do i need extract RunningLog convert to a separate function?
    }
}