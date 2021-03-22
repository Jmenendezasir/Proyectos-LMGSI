<?php
namespace App\Model;
use App\Config\DB;

class EditoresModel {
    private static $table = 'editores';
    private static $DB;

    public static function conexionDB(){
        EditoresModel::$DB = new DB();
    }
   
    public static function getAll(){
        EditoresModel::conexionDB();
        $sql = "Select * from editores";
        $data = EditoresModel::$DB->run($sql, []);
        return $data->fetchAll();
    }
    
}