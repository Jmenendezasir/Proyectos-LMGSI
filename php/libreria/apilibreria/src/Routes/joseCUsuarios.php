<?php

use Slim\Routing\RouteCollectorProxy;

$app->group('/api', function(RouteCollectorProxy $group){
    $group->post('/joseCUsuarios/new', 'App\Controllers\joseCUsuariosController:joseCnew');
    $group->post('/joseCUsuarios/new/profile', 'App\Controllers\joseCUsuariosController:joseCnewProfile');
});