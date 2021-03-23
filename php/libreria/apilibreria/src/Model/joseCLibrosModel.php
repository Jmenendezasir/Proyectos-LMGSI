<?php
namespace App\Model;
use App\Config\DB;

class joseCLibrosModel {
    private static $table = 'libros';
    private static $DB;

    public static function conexionDB(){
        joseCLibrosModel::$DB = new DB();
    }
    public static function joseCgetAll(){
        joseCLibrosModel::conexionDB();
        $sql = "Select * from libros";
        $data = joseCLibrosModel::$DB->run($sql, []);
        return $data->fetchAll();
    }
    public static function joseCgetFilter($param){
        joseCLibrosModel::conexionDB();
        $sql = 'Select * from libros where precio > ? and categoriaid = ?';
    //$sql = 'SELECT * FROM CATEGORIAS C INNER JOIN LIBROS L ON C.CATEGORIAID=L.CATEGORIAID WHERE PRECIO> ? AND NOMBRE_CATEGORIA = ?';
        $data = LibrosModel::$DB->run($sql, $param);
        return $data->fetchAll();
    }
}