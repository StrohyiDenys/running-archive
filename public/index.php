<?php

use Core\Database;
use Core\Router;

const BASE_DIR = __DIR__ . '/../';
require BASE_DIR . "vendor/autoload.php";
$db_config = (require BASE_DIR . "src/config.php")['database'];
$db = new Database($db_config, 'root');
$router = new Router();
$uri = $_SERVER['REQUEST_URI'];
$method = $_POST['method'] ?? $_SERVER['REQUEST_METHOD'];

require BASE_DIR . "src/routes.php";
$router->route($uri, $method);
//Now: create the LogRepository
//Create the Auth controller and routes
//Create the UserRepository

