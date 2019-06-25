<?php
namespace DB;
use PDO;

abstract class Database{
    public static function conectar(){
        try{
            $dsn = "mysql:host=localhost;dbname=cadif1";
            $usuario = "root";
            $pass = "";
            
            $conexion =  new \PDO($dsn, $usuario, $pass);
            echo "<h1 style=color:green>conexion exitosa</h1>"; 

            $conexion->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            return $conexion;
            
        } catch (PDOException $e) {
            session_start();
            $_SESSION["error"] = $e->getMessage(); 
            header("Location: error1.php");
        }
    }
}



?>
