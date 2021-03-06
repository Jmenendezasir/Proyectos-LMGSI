<?php
namespace App\Model;
use App\Config\DB;

class joseCLibrosModel {
    private static $table = 'libros';
    private static $table2 = 'categorias';
    private static $table3 = 'detallepedidos';
    private static $table4 = 'usuarios';

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
        $sql = 'SELECT * FROM categorias C INNER JOIN libros L ON C.CATEGORIAID=L.CATEGORIAID WHERE PRECIO> ? AND NOMBRE_CATEGORIA = ?';
        $data = joseCLibrosModel::$DB->run($sql, $param);
        return $data->fetchAll();
    }
    public static function joseCPlus ($param){
        joseCLibrosModel::conexionDB();
        $sql = 'ALTER TABLE libros MODIFY COLUMN (
            stock = + ?
            precio = + ?)';
        $data = joseCLibrosModel::$DB->run($sql, $param);
        return $data->fetchAll();
    }
    public static function joseCgetCompras($param){
        joseCLibrosModel::conexionDB();
        $sql = 'select * from libros inner join detallepedidos on CodigoLibro=libro_id where codigousuario in (select usuarioid from usuarios where usuarioid= ? )';
        $data = joseCLibrosModel::$DB->run($sql, $param);
        return $data->fetchAll();
    }
}