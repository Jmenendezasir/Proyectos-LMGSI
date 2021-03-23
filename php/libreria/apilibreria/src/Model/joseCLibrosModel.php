<?php
namespace App\Model;
use App\Config\DB;

class joseCLibrosModel {
    private static $table = 'libros';
    private static $DB;

    public static function conexionDB(){
        joseCLibrosModel::$DB = new DB();
    }
    public static function joseCgetFilter($param){
        joseCLibrosModel::conexionDB();
        $sql = 'Select * from libros where precio > ? and categoriaid = ?';
        $data = LibrosModel::$DB->run($sql, $param);
        return $data->fetchAll();
    }
}