<?php

class Conexion{
    public function conectar(){
        try{
            $dsn = "mysql:host=localhost;dbname=cadif1";
            $usuario = "root";
            $pass = "";
            
            $conexion =  new PDO($dsn, $usuario, $pass);
            echo "<h1 style=color:green>conexion exitosa</h1>";    
            
            return $conexion;
            
        } catch (PDOException $e) {
           echo "Error: ".$e->getMessage();
                   
        }
    }
}
$con= new Conexion;

$con->conectar();
?>


