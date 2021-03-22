<?php
    namespace App\Controllers;
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
#use App\Controllers\BaseController;
    use App\Model\LibrosModel;    

    class LibrosController {
        
        public function new(Request $request, Response $response, $args){
            $parametros = $request->getParsedBody();
          //  var_dump($parametros);
            $response->getBody()->write("Insertar un nuevo Libro1");
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }

        public function getFilter(Request $request, Response $response, $args){
            $parametros = $request->getQueryParams();
            $precio = $parametros['precio']; 
            $ed = $parametros['editorial'];   
          // montamos el array de parametros de la GET
            $valores = array($precio, $ed);
            $libros = LibrosModel::getFilter($valores);
            $librosJson = json_encode($libros); 
            $response->getBody()->write($librosJson);
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
        public function getAll(Request $request, Response $response, $args){
           
            $libros = LibrosModel::getAll();
            $librosJson = json_encode($libros);
           // $librosJson = "Listado de libros";
            $response->getBody()->write("Soy LibrosControLLer");
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
    }