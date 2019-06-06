<?php 
namespace Models;
require_once "database.php";

use DB\Database;

class Usuario extends Database{
    private $table;

    public function __construct(){
        $this->table ="tb_usuarios";
    }

    public function leerTodos(){
        try{
            $resultado = $this->conectar()->query(
                "SELECT * FROM $this->table"
            );
            $resultado->setfetchMode(\PDO::FETCH_OBJ);
            return $resultado->fetchAll();

        }catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        }
    }

    public function buscar($nombre){
        try{
            $resultado = $this->conectar()->query(
                "SELECT * FROM $this->table
                WHERE nombre LIKE '$nombre'"
            );
            $resultado->setfetchMode(\PDO::FETCH_OBJ);
            if($resultado->rowCount()){
                return $resultado->fetchAll();
            }else{
                return null;
            }
            return $resultado->fetchAll();

        }catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        }
    }
}


?>