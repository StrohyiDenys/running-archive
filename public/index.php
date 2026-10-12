<?php

use Core\Database;

const BASE_DIR = __DIR__ . '/../';
require BASE_DIR . "vendor/autoload.php";
$db_config = (require BASE_DIR . "src/config.php")['database'];
$db = new Database($db_config, 'root');
$result = $db->query("SELECT * FROM users")->fetch();
dd($result);
// Create db class
// Create Response class
// Fill the index.php
//    composerё
//    database initialization
//    routing
//Next build the business-logic:
//Note Repository, UserRepository, Controller