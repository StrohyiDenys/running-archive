<?php

namespace App\Models\Repositories;

use App\Core\Database;

class RunningLogRepository
{
    private Database $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function getAll() //: RunningLog
    {
        return $this->db->query("SELECT * FROM running_logs")->fetchAll();
        // fetchAll(statement)
        // transform array to array of RunningLog objects
        // do i need extract RunningLog convert to a separate function?
    }
    public function findById($id) : RunningLog
    {
        // fetch(statement)
        // transform array to RunningLog object
    }
}