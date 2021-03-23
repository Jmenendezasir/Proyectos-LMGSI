<?php

use Slim\Routing\RouteCollectorProxy;

//contendrá los entrypoints (acciones CRUD) de la tabla usuarios

$app->group('/api', function(RouteCollectorProxy $group){
    $group->get('/usuarios', 'App\Controllers\UsuariosController:getAll');
    $group->post('/usuarios/new', 'App\Controllers\UsuariosController:new');
    $group->delete('/usuarios/delete', 'App\Controllers\UsuariosController:delete'); 
});