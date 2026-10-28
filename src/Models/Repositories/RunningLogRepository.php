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
    public function getById($id) : RunningLog // show
    {
        $result = $this->db->query("SELECT * FROM running_logs WHERE id = :id", ['id' => $id])->fetch();
        return $this->toEntity($result);
    }
    public function create(?int $user_id, ?float $distance, ?int $time, string $date, ?string $notes) : RunningLog // store
    {
        $this->db->query("INSERT INTO running_logs(user_id, distance, time, date, notes) VALUES(:user_id, :distance, :time, :date, :notes)", ['user_id' => $user_id, 'distance' => $distance, 'time' => $time, 'date' => $date, 'notes' => $notes]);
        $id = $this->db->getLastInsertId();
        $result = $this->db->query("SELECT * FROM running_logs WHERE id = :id", ['id' => $id])->fetch();
        return $this->toEntity($result);
    }
    public function update(int $id, ?int $user_id, ?float $distance, ?int $time, string $date, ?string $notes) : RunningLog // update
    {
        $this->db->Query("UPDATE running_logs SET user_id = :user_id, distance = :distance, time = :time, date = :date, notes = :notes WHERE id = :id", ['id' => $id, 'user_id' => $user_id, 'distance' => $distance, 'time' => $time, 'date' => $date, 'notes' => $notes]);
        $result = $this->db->query("SELECT * FROM running_logs WHERE id = :id", ['id' => $id])->fetch();
        return $this->toEntity($result);
    }
    public function delete(int $id) : array {
        $this->db->query("DELETE FROM running_logs WHERE id = :id", ['id' => $id]);
        return ['success' => true, 'message' => 'Running log deleted successfully'];
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