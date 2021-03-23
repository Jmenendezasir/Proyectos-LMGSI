<?php
    namespace App\Controllers;
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
#use App\Controllers\BaseController;
    use App\Model\LibrosModel;    

    class LibrosController {
        public function getFilter(Request $request, Response $response, $args){
            $parametros = $request->getQueryParams();
            $precio = $parametros['precio']; 
            $ed = $parametros['editorial'];   
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
            $response->getBody()->write($librosJson);
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
        public function new(Request $request, Response $response, $args){
            $parametros = $request->getParsedBody();
           
            $libroid = (int)$parametros['libro_id'];
            $nombre = $parametros['nombre_libro'];
            $descripcion = $parametros['descripcion'];
            $categoriaid = $parametros['categoriaid'];
            $editorid = (int)$parametros['editorid'];
            $precio = (int)$parametros['precio'];
            $entrega = (int)$parametros['entrega'];
            $imagen = $parametros['imagen'];
            $stock = (int)$parametros['stock'];
            $valores = array($libroid, $nombre, $descripcion, $categoriaid, $editorid, $precio, $entrega, $imagen, $stock);
            $result = LibrosModel::new($valores);
            $resultJson = json_encode($result);
            $response->getBody()->write($resultJson);
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
        public function delete($request, $response, $args){
            $parametros = $request->getQueryParams();
            $libroid = $parametros['libro_id'];
            $valoresParametro = array($libroid);
            $libros = LibrosModel::delete($valoresParametro);
            $librosJson = json_encode($libros);
            $response->getBody()->write($librosJson);
            return $response
                 ->withHeader('Content-Type', 'application/json')
                  ->withStatus(200);
        }
    }