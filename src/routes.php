<?php

use App\Controllers\RunningLogController;
use App\Models\Repositories\RunningLogRepository;

$runningLogController = new RunningLogController(new RunningLogRepository($db));
$router->get('/logs', $runningLogController, 'index');
$router->get('/logs/{id}', $runningLogController, 'show');
$router->post('/logs', $runningLogController, 'store');
$router->delete('/logs/{id}', $runningLogController, 'destroy');
$router->put('/logs/{id}', $runningLogController, 'update');
// todo something like $router->post('/auth/register', $authController, 'register');
