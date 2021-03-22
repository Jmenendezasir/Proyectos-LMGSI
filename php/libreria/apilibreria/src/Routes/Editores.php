<?php
use Slim\Routing\RouteCollectorProxy;

$app->group('/api', function(RouteCollectorProxy $group){
    $group->get('/editores', 'App\Controllers\EditoresController:getAll');
    $group->get('/editores/filter', 'App\Controller\EditoresController:getFilter');

});