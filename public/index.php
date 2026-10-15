<?php

use Core\Database;
use Core\Router;

const BASE_DIR = __DIR__ . '/../';
require BASE_DIR . "vendor/autoload.php";
$db_config = (require BASE_DIR . "src/config.php")['database'];
$db = new Database($db_config, 'root');
$router = new Router();
require BASE_DIR . "src/routes.php";
// Create db class
// Create Response class
// Fill the index.php
//    composer
//    database initialization
//    routing
//Next build the business-logic:
//Note Repository, UserRepository, Controller