<?php
namespace App\Model;
use App\Config\DB;

class joseCLibrosModel {
    private static $table = 'libros';
    private static $table = 'categorias';
    private static $DB;

    public static function conexionDB(){
        joseCLibrosModel::$DB = new DB();
    }
    public static function joseCgetAll(){
        joseCLibrosModel::conexionDB();
        $sql = 'SELECT * FROM LIBROS';
        $data = joseCLibrosModel::$DB->run($sql, []);
        return $data->fetchAll();
    }
    public static function joseCgetFilter($param){
        joseCLibrosModel::conexionDB();
        $sql = 'SELECT * FROM CATEGORIAS C INNER JOIN LIBROS L ON C.CATEGORIAID=L.CATEGORIAID WHERE PRECIO> ? AND NOMBRE_CATEGORIA = ?';
        $data = joseCLibrosModel::$DB->run($sql, $param);
        return $data->fetchAll();
    }
}