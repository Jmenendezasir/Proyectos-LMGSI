<?php
# para agrupar las rutas en grupos
use Slim\Routing\RouteCollectorProxy;

//contendrá los entrypoints (acciones CRUD) de la tabla libros
$app->group('/api', function(RouteCollectorProxy $group){
    $group->get('/libros', 'App\Controllers\LibrosController:getAll');
    $group->get('/libros/filter', 'App\Controllers\LibrosController:getFilter');
    //$group->post('/libros/new', 'App\Controllers\LibrosController:new');   
    #  $group->get('/libros/{id}', 'App\Controllers\LibrosController:show');
});