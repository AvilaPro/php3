<?php
//namespace DB;

abstract class Database{
    public function conectar(){
        try{
            $dsn = "mysql:host=localhost;dbname=cadif1";
            $usuario = "root";
            $pass = "";
            
            $conexion =  new \PDO($dsn, $usuario, $pass);
            echo "<h1 style=color:green>conexion exitosa</h1>"; 

             
            
            return $conexion;
            
        } catch (PDOException $e) {  
            header("Location: error1.php");
        }
    }
}



?>
