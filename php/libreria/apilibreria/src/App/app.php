<?php
 
use Slim\Factory\AppFactory;
use Slim\Exception\NotFoundException;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require __DIR__ . '/../../vendor/autoload.php';
 
 

$app = AppFactory::create();
$app->setBasePath("/php/libreria/apilibreria/public/index.php");
/*$app->get("/hello", function(Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world");
    return $response;
}); */

require __DIR__ . "/../Routes/Libros.php";
require __DIR__ . "/../Routes/Categorias.php";
require __DIR__ . "/../Routes/Usuarios.php";
require __DIR__ . "/../Routes/Editores.php";

$app->run();

