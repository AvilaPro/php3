<?php

class Conexion{
    
    public function conectar($dsn1,$usuario,$pass){
        try{
            
            $conexion =  new PDO($dsn1, $usuario, $pass);  
            echo "<h1 style=color:green>conexion exitosa</h1>";
            return $conexion;

            
            
        } catch (PDOException $e) {
            echo "Error= ".$e->getMessage();
        }
    }
}

?>

