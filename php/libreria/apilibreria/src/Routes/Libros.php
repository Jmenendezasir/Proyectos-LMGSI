<?php
# para agrupar las rutas en grupos
use Slim\Routing\RouteCollectorProxy;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

//contendrá los entrypoints (acciones CRUD) de la tabla libros
$app->group('/api', function(RouteCollectorProxy $group){
    $group->get('/libros', 'App\Controllers\LibrosController:getAll'); 
    $group->get('/libros/filter', 'App\Controllers\LibrosController:getFilter');
    $group->post('/libros/new', 'App\Controllers\LibrosController:new');   
    $group->delete('/libros/delete', 'App\Controllers\LibrosController:delete'); 
});
