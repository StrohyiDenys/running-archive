<?php

namespace App\Models\Repositories;

use App\Core\Database;
use App\Models\Entities\RunningLog;
use JsonSerializable;

class RunningLogRepository
{
    private Database $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function getAll() : array //index
    {
        $result = $this->db->query("SELECT * FROM running_logs")->fetchAll();
        foreach ($result as $row) {
            $logs[] = $this->toEntity($row);
        }
        return $logs;

        // fetchAll(statement)
        // transform array to array of RunningLog objects
        // do i need extract RunningLog convert to a separate function?
    }
    public function findById($id) : RunningLog // show
    {
        // fetch(statement)
        // transform array to RunningLog object
    }
    public function create($data) : RunningLog // store
    {
        // insert into running_logs (user_id, distance, time, date, notes) values (:user_id, :distance, :time, :date, :notes)
        // return new RunningLog object
    }
    private function toEntity($log) :RunningLog
    {
            return new RunningLog(
                $log['id'],
                $log['user_id'],
                $log['distance'],
                $log['time'],
                $log['date'],
                $log['notes'],
                $log['created_at'],
                $log['updated_at']
            );
    }

}