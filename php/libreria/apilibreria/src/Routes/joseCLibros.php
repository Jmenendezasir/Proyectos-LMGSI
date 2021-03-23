<?php

use Slim\Routing\RouteCollectorProxy;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app->group('/api', function(RouteCollectorProxy $group){
    $group->get('/joseCLibros', 'App\Controllers\joseCLibrosController:joseCgetAll'); 
    $group->get('/joseCLibros/filter', 'App\Controllers\joseCLibrosController:joseCgetFilter');
    $group->get('/joseCLibros/plus', 'App\Controllers\joseCLibrosController:joseCPlus');
    $group->get('/joseCLibros/compras', 'App\Controllers\joseCLibrosController:joseCgetCompras');
});