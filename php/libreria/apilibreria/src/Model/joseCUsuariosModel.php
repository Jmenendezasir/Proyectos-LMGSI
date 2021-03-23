<?php 
namespace App\Model;
use App\Config\DB;
use Exception;


class joseCUsuariosModel {
    private static $table = 'usuarios';
    private static $table2 = 'perfiles';
    private static $DB; 

    public static function conexionDB(){
        joseCUsuariosModel::$DB = new DB();
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
    public static function joseCnewProfile($param){
        try{
            joseCUsuariosModel::conexionDB();
            $sql = "insert into perfiles inner join usuarios on usuarioid=userid (perfilid,email,facebook,instagram,foto,rol,userid) 
                    values (?, ?, ?, ?, ?, ?, ?)";
            $data = joseCUsuariosModel::$DB->run($sql, $param);
            return "Perfil de usuario ". $param[1] . " insertado correctamente ";
       } catch(Exception $e){
          return $e->getMessage();
       }
    }
}