<?php
# para agrupar las rutas en grupos
use Slim\Routing\RouteCollectorProxy;

//contendrá los entrypoints (acciones CRUD) de la tabla categorias
$app->group('/api', function(RouteCollectorProxy $group){
    $group->get('/categorias', 'App\Controllers\CategoriasController:getAll');
    $group->post('/categorias/new', 'App\Controllers\CategoriasController:new');   
});