<?php

use Slim\Routing\RouteCollectorProxy;

$app->group('/api', function(RouteCollectorProxy $group){
    $group->post('/joseCUsuarios/new', 'App\Controllers\joseCUsuariosController:new');