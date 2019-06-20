<?php
 
namespace DB;

abstract class Database{
    
    public static function conectar(){
        
            $dsn = "mysql:host=localhost;dbname=cadif1";
            $usuario = "root";
            $pass = "";
            
            $conexion = new \PDO($dsn, $usuario, $pass);
            $conexion->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $conexion;
            
       
    }
}

