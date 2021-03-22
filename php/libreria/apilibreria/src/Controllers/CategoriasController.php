<?php
    namespace App\Controllers;
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use App\Model\CategoriasModel;

    class CategoriasController {
        
        public function getAll(Request $request, Response $response, $args){
           // $categorias = CategoriasModel::getAll();
          //  $categoriasJson = json_encode($categorias);
            $response->getBody()->write("hola mundo");
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
    }