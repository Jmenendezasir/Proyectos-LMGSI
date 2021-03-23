<?php
    namespace App\Controllers;
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    use App\Model\joseCLibrosModel;

    class joseCLibrosController {
        public function joseCgetFilter(Request $request, Response $response, $args){
            $parametros = $request->getQueryParams();
            $precio = $parametros['precio']; 
            $cat = $parametros['categoriaid'];   
            $valores = array($precio, $ed);
            $libros = joseCLibrosModel::joseCgetFilter($valores);
            $librosJson = json_encode($libros); 
            $response->getBody()->write($librosJson);
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
    }