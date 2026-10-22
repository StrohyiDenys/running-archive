<?php

namespace App\Core;
use PDO;
class Database
{
    private PDO $connection;
    private $statement;
    public function __construct($config, $user, $password = ''){
        $this->connection = new PDO($this->getDSN($config), $user, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    public function query(string $sql, array $params = []){
        $this->statement = $this->connection->prepare($sql);
        $this->statement->execute($params);
        return $this;
    }
    public function fetch(): array{
        return $this->statement->fetch();
    }
    public function fetchALl(): array{
        return $this->statement->fetchAll();
    }
    private function getDSN($config){
        return 'mysql:' . str_replace("&", ";", http_build_query($config));
    }
}