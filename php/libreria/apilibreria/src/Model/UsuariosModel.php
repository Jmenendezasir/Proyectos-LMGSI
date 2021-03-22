<?php 
namespace App\Model;
use App\Config\DB;
use Exception;


class UsuariosModel {
    private static $table = 'usuarios';
    private static $DB; 

    public static function conexionDB(){
        UsuariosModel::$DB = new DB();
    }

    public static function getAll(){
      UsuariosModel::conexionDB();
      $sql = "Select * from usuarios";
      $data = UsuariosModel::$DB->run($sql, []);
      return $data->fetchAll();
    }
    public static function new($param){
       // print_r(array_keys($param));
       try{
         //   $values = array_values($param);
         //   var_dump($param);
            UsuariosModel::conexionDB();
            $sql = "insert into usuarios (usuarioid, nombre, apellidos, direccion, ciudad, anioNac) 
                    values (?, ?, ?, ?, ?, ?)";
            $data = UsuariosModel::$DB->run($sql, $param);
            return "Usuario ". $param[1] . " insertado correctamente ";
       } catch(Exception $e){
          return $e->getMessage();
       }
        
    //    return $data->fetch();

    }
}