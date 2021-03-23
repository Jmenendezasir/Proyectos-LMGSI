<?php
    namespace App\Controllers;
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use App\Model\joseCDetallePedidosModel;
    class joseCDetallePedidosController {
        public function joseCnew(Request  $request, Response $response, $args){
            $parametros = $request->getParsedBody();
           
            $lid = (int)$parametros['libroid'];
            $uid = $parametros['usuarioid'];
            $cantidad = (int)$parametros['cantidad'];
            $descuento = $parametros['descuento'];
            $fecha = $parametros['fecha'];
            $valores = array($lid, $uid, $cantidad, $descuento, $fecha);
            $result = joseCDetallePedidosModel::joseCnew($valores);
            $resultJson = json_encode($result);
            $response->getBody()->write($resultJson);
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
    }