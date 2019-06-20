<?php
namespace Models;

require_once 'database.php';

use DB\Database;
use PDO;
use PDOException;

class Usuario extends Database{
    
    const TABLE = "tb_usuarios";
  
    public static function leerTodos(){
        
        try {
            
            $resultado = parent::conectar()->query("SELECT * FROM ".self::TABLE);
            
            $resultado->setFetchMode(PDO::FETCH_OBJ);
            
            return $resultado->fetchAll();
                    
        } catch (PDOException $e) {
           session_start();
           $_SESSION["error"] = $e->getMessage();
            
           header("location:error.php");
        }
    }
    
    public static function leerUno($id){
        
        try {
            
            $resultado = parent::conectar()->query("SELECT * FROM ".self::TABLE." WHERE id ='$id' ");
            
            $resultado->setFetchMode(PDO::FETCH_OBJ);
            
            return $resultado->fetch();
                    
        } catch (PDOException $e) {
           session_start();
           $_SESSION["error"] = $e->getMessage();
            
           header("location:error.php");
        }
    }

    public static function buscar($nombre){
        
        try {
            
            $resultado = parent::conectar()->query("SELECT * FROM ".self::TABLE." WHERE nombre LIKE '$nombre%'");
            
            $resultado->setFetchMode(PDO::FETCH_OBJ);
            
            if($resultado->rowCount() != 0 ){
                
             return $resultado->fetchAll();
             
            }  else {
                
            return NULL;   
            }
            
                    
        } catch (\PDOException $e) {
            session_start();
           $_SESSION["error"] = $e->getMessage();
            
           header("location:error.php");
        }
    }
    
    public static function insertar($nombre, $apellido, $edad, $fecha_nacimiento){
        
        try {
            
            $usuario = "INSERT INTO ".self::TABLE." "
                    . "(nombre, apellido, edad, fecha_nacimiento) "
                    . "VALUES('$nombre', '$apellido', '$edad', '$fecha_nacimiento')";
            
            $resultado = parent::conectar()->exec($usuario);
            
            return $resultado;
            
        } catch (\PDOException $e) {
             session_start();
           $_SESSION["error"] = $e->getMessage();
            
           header("location:error.php");
        }
    }
    
    public static function actualizar($id, $nombre, $apellido, $edad, $fecha_nacimiento){
        
        try {
            
            $usuario = "UPDATE ".self::TABLE." "
                    . " SET nombre='$nombre', apellido='$apellido', edad='$edad', fecha_nacimiento='$fecha_nacimiento' "
                    . " WHERE id='$id'";
            
            $resultado = parent::conectar()->exec($usuario);
            
            return $resultado;
            
        } catch (\PDOException $e) {
             session_start();
           $_SESSION["error"] = $e->getMessage();
            
           header("location:error.php");
        }
    }
}
