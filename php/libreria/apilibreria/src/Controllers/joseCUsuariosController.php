<?php
    namespace App\Controllers;
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use App\Model\joseCUsuariosModel;
    class joseCUsuariosController {

        public function joseCnew(Request  $request, Response $response, $args){
            $parametros = $request->getParsedBody();
           
            $uid = (int)$parametros['usuarioid'];
            $nombre = $parametros['nombre'];
            $apellidos = $parametros['apellidos'];
            $direccion = $parametros['direccion'];
            $anionac = (int)$parametros['anioNac'];
            $ciudad = $parametros['ciudad'];
            $valores = array($uid, $nombre, $apellidos, $direccion, $ciudad, $anionac);
            $result = joseCUsuariosModel::joseCnew($valores);
            $resultJson = json_encode($result);
            $response->getBody()->write($resultJson);
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
        public function joseCnewProfile(Request  $request, Response $response, $args){
            $parametros = $request ->getParsedBody();

            $pid = (int)$parametros['perfilid'];
            $email = $parametros['email'];
            $facebook = $parametros['facebook'];
            $instagram = $parametros['instagram'];
            $foto = $parametros['foto'];
            $rol = $parametros ['rol'];
            $uid = (int) $parametros['uid'];
            $result = joseCUsuariosModel::joseCnewProfile($valores);
            $resultJson = json_encode($result);
            $response->getBody()->write($resultJson);
            return $response   
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
    }