<?php
namespace App\Config;
use \PDO;
use App\Config\Config;

class DB {
    protected $pdo;

    // ESTABLECE LA CONEXIÓN AL HACER UN newDB() DESDE EL CONTROLADOR
    public function __construct() {
    $opciones = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //que PDO lance las excepciones si hay errores
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ //los resultados los regrese en un objeto
    ];

    // CADENA DE CONEXIÓN A LA BD

    $dsn = 
    "mysql:host=".config::DB_HOST.
    ";dbname=".config::DB_NAME.
    ";charset=".config::DB_CHARSET.
    ";port=".config::DB_PORT;
    // SE ESTABLECE LA CONEXIÓN CON LA BD
    $this->pdo = new PDO($dsn, config::DB_USER, config::DB_PASSWORD, $opciones);
}

public function run($sql, $args = []){
    // Ejecutará las consulta $sql con parámetros que le pasemos
    //sql --> select * from articulos where id = ? and precio > ?
    //En args meteremos variables del where de una consulta --> $args = [10, 56.7]
    if (!$args){
        $data = $this->pdo->query($sql);
        return $data;
    }
    $sentencia = $this->pdo->prepare($sql);
    $sentencia->execute($args);
    return $sentencia;
    }
}