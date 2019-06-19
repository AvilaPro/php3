<?php 
namespace Models;
session_start();
require_once "database.php";

use DB\Database;

class Usuario extends Database{
    const TABLE ="tb_usuarios";
    //private $table;
    //public function __construct(){
        //$this->table ="tb_usuarios";}
    

    //se convierten en static para el nuevo metodo de acceso
    public static function leerTodos(){
        try{
            $resultado = parent::conectar()->query(
                "SELECT * FROM ".self::TABLE   //$this->table
            );
            $resultado->setfetchMode(\PDO::FETCH_OBJ);
            return $resultado->fetchAll();

        }catch (\PDOException $e) {
            //comentado en clase3
            //echo "Error: ".$e->getMessage();
            session_start();
            $_SESSION["error"] = $e->getMessage();
            header("Location: error1.php");
        }
    }

    //se convierten en static para el nuevo metodo de acceso
    public static function buscar($nombre){
        try{
            $resultado = parent::conectar()->query(  //antes decia: $resultado = $this->conectar()->query(
                "SELECT * FROM ".self::TABLE." WHERE nombre LIKE '%$nombre%'" //antes para acceder a la tabla usabamos esto: $this->table
            );
            $resultado->setfetchMode(\PDO::FETCH_OBJ);
            if($resultado->rowCount()){
                return $resultado->fetchAll();
            }else{
                return null;
            }
            return $resultado->fetchAll();

        }catch (\PDOException $e) {
            //comentado en clase3
            //echo "Error: ".$e->getMessage();
            session_start();
            $_SESSION["error"] = $e->getMessage();
            header("Location: error1.php");
        }
    }

    public static function insertar($nombre, $apellido, $edad, $fecha){
        try{
            $usuario = "INSERT INTO ".self::TABLE." " 
                        ."(nombre, apellido, edad, fecha_nacimiento) "
                        ."VALUES('$nombre', '$apellido', '$edad', '$fecha')";
            $resultado = parent::conectar()->exec($usuario);
        }catch (\PDOException $e){
            session_start();
            $_SESSION["error"] = $e->getMessage();
            header("Location: error1.php");
        }
    }

    public static function actualizar($id, $nombre, $apellido, $edad, $fecha){
        try{
            $usuario = "UPDATE ".self::TABLE
            ." SET nombre='$nombre', apellido='$apellido', edad='$edad', fecha_nacimiento='$fecha' WHERE id='$id'";
            $resultado = parent::conectar()->exec($usuario);
        }catch (\PDOException $e){
            session_start();
            $_SESSION["error"] = $e->getMessage();
            header("Location: error1.php");
        }
    }

    public static function leerUno($id){
        try{
            $resultado = parent::conectar()->query(
                "SELECT * FROM ".self::TABLE." WHERE id ='$id'");
            $resultado->setfetchMode(\PDO::FETCH_OBJ);
            return $resultado->fetch();
        }catch (PDOException $e){
            session_start();
            $_SESSION["error"] = $e->getMessage();
            header("Location: error1.php");
        }
    }

    public static function eliminar($id){
        try{
            $usuario = "DELETE FROM ".self::TABLE." WHERE id = '%$id%'";
            $resultado = parent::conectar()->exec($usuario);
        }catch(PDOException $e){
            session_start();
            $_SESSION["error"] = $e->getMessage();
            header("Location: error1.php");
        }
    }

    public static function eliminarMarcados($claves){
        try{
            //con instrucciones preparadas (clase 4)
            $usuario = "DELETE FROM ".self::TABLE." WHERE id =:id";
            $resultado = parent::conectar()->prepare($usuario);
            foreach($claves as $id){
                $resultado->bindParam(":id", $id);
                $resultado->execute();
            }
            //sin instrucciones preparadas (clase4)
            /* foreach($claves as $id){
                $usuario = "DELETE FROM ".self::TABLE." WHERE id ='$id'";
                $resultado = parent::conectar()->exec($usuario);
            } */
            return $resultado;
        }catch(PDOException $e){
            session_start();
            $_SESSION["error"] = $e->getMessage();
            header("Location: error1.php");
        }
    }

    /* public static function eliminarVarios($ids){
        $id_usuarios= imploe(",",$ids);
        try{
            $usuario = "DELETE FROM ".self::TABLE." WHERE id IN($id_usuarios)";
            $resultado = parent::conectar()->exec($usuario);
            return $resultado;
        }catch(PDOException $e){
            session_start();
            $_SESSION["error"] = $e->getMessage();
            header("Location: error1.php");
        }
    } */
}


?>