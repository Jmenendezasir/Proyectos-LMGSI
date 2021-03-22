<?php
    namespace App\Controllers;
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use App\Model\EditoresModel;    

    class EditoresController {
        
        public function getAll(Request $request, Response $response, $args){
            $editores = EditoresModel::getAll();
            $editoresJson = json_encode($editores);
           // $librosJson = "Listado de libros";
            $response->getBody()->write($editoresJson);
           // $response->getBody()->write("Listado de Editores");
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
    }