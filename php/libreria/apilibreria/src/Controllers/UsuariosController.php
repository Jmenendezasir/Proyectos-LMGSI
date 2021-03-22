<?php
    namespace App\Controllers;
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use App\Model\UsuariosModel;
    class UsuariosController {
    
        public function new(Request  $request, Response $response, $args){
            $parametros = $request->getParsedBody();
           
            $uid = (int)$parametros['usuarioid'];
            $nombre = $parametros['nombre'];
            $apellidos = $parametros['apellidos'];
            $direccion = $parametros['direccion'];
            $anionac = (int)$parametros['anioNac'];
            $ciudad = $parametros['ciudad'];
            $valores = array($uid, $nombre, $apellidos, $direccion, $ciudad, $anionac);
            $result = UsuariosModel::new($valores);
            $resultJson = json_encode($result);
            $response->getBody()->write($resultJson);
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
       
        public function getAll($request, $response, $args){
            $usuarios = UsuariosModel::getAll();
            $usuariosJson = json_encode($usuarios);
            $response->getBody()->write($usuariosJson);
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
            }
        public function delete($request, $response, $args){
            $parametros = $request->getQueryParams();

            $uid = $parametros['usuarioid'];
            $valoresParametro = array($uid);
            $usuario = usuariosModel::delete($valoresParametro);
            $usuarioJson = json_encode($usuario);
            $response->getBody()->write($usuarioJson);
            return $response
                 ->withHeader('Content-Type', 'application/json')
                  ->withStatus(200);
        }
        }