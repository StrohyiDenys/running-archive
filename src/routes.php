<?php

use controllers\RunningLogController;

$runningLogController = new RunningLogController();
$router->get('/logs', $runningLogController, 'index');
$router->get('/logs/{id}', $runningLogController, 'show');
$router->post('/logs', $runningLogController, 'store');
$router->delete('/logs/{id}', $runningLogController, 'destroy');
