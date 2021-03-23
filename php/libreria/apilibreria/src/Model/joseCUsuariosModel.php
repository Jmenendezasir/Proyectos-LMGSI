<?php 
namespace App\Model;
use App\Config\DB;
use Exception;


class joseCUsuariosModel {
    
    public static function conexionDB(){
        UsuariosModel::$DB = new DB();
    }
    public static function joseCnew($param){
        try{
             joseCUsuariosModel::conexionDB();
             $sql = "insert into usuarios (usuarioid, nombre, apellidos, direccion, ciudad, anioNac) 
                     values (?, ?, ?, ?, ?, ?)";
             $data = joseCUsuariosModel::$DB->run($sql, $param);
             return "Usuario ". $param[1] . " insertado correctamente ";
        } catch(Exception $e){
           return $e->getMessage();
        }
    }
}