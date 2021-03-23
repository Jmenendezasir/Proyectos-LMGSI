<?php 
namespace App\Model;
use App\Config\DB;
use Exception;


class joseCDetallePedidosModel {
    private static $table = 'detallepedidos';
    private static $DB; 

    public static function conexionDB(){
        joseCDetallePedidosModel::$DB = new DB();
    }
    public static function joseCnew($param){
        try{
             joseCDetallePedidosModel::conexionDB();
             $sql = "insert into detallepedidos (libroid, usuarioid, cantidad, descuento, fecha) 
                     values (?, ?, ?, ?, ?)";
             $data = joseCDetallePedidosModel::$DB->run($sql, $param);
             return "El pedido de ". $param[2], $param[1] . " se ha realizado correctamente";
        } catch(Exception $e){
           return $e->getMessage();
        }
    }
}