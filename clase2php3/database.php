<?php
namespace DB;
use PDO;
abstract class Database{
    //en clase 3 hicimos este metodo como static para invocarlo en usuario.php con parent
    public static function conectar(){
        try{
            $dsn = "mysql:host=localhost;dbname=cadif1";
            $usuario = "root";
            $pass = "";
            
            $conexion =  new PDO($dsn, $usuario, $pass);
            echo "<h1 style=color:green>conexion exitosa</h1>";    
            
            //agregado en clase3
            $conexion->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            //fin agregado


            return $conexion;
            
        } catch (\PDOException $e) {
            //en clase3
            //se comento el siguiente echo
            //echo "Error".$e->getMessage();

            //se agrego el session para que se lleve el error
            session_start();
            $_SESSION["error"] = $e->getMessage();
            header("Location: error1.php");
            
        }
    }
}
?>