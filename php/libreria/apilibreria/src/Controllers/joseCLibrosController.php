<?php
    namespace App\Controllers;
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    use App\Model\joseCLibrosModel;

    class joseCLibrosController {
        public function joseCgetAll(Request $request, Response $response, $args){
            $libros = joseCLibrosModel::joseCgetAll();
            $librosJson = json_encode($libros);
            $response->getBody()->write($librosJson);
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
        public function joseCgetFilter(Request $request, Response $response, $args){
            $parametros = $request->getQueryParams();
            $precio = $parametros['precio']; 
            $cat = $parametros['nombre_categoria'];   
            $valores = array($precio, $cat);
            $libros = joseCLibrosModel::joseCgetFilter($valores);
            $librosJson = json_encode($libros); 
            $response->getBody()->write($librosJson);
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
        public function joseCPlus(Request $request, Response $response, $args){
            $parametros = $request ->getQueryParams();
            $stock = $parametros['stock'];
            $precio = $parametros['precio'];
            $categoria = $parametros['categoriaid'];
            $valores = array($stock, $precio, $categoria);
            $libros = joseCLibrosModel::joseCgetFilter($valores);
            $librosJson = json_encode($libros); 
            $response->getBody()->write($librosJson);
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
    }