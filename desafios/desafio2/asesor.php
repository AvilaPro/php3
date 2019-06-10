<?php
    namespace Models;
    require "database.php";
    use Database;

    class Asesor extends Database{
        private $table;
        public $tb_cursos="asesor_curso";

        public function __construct(){
            $this->table ="asesores";
        }

        public function leerTodos(){
            try{
                $resultado = $this->conectar()->query(
                    "SELECT * FROM $this->table"
                );
                $resultado->setfetchMode(\PDO::FETCH_OBJ);
                return $resultado->fetchAll();
            }catch(PDOException $e){
                echo "Error: " .$e->getMessage();
            }
        }

        public function buscar($nombre){
            try{
                $resultado1 = $this->conectar()->query(
                    "SELECT * FROM $this->table WHERE nombre LIKE '%$nombre%'"
                );
                $resultado1->setfetchMode(\PDO::FETCH_OBJ);
                if ($resultado1->rowCount()) {
                    return $resultado1->fetchAll();
                    return $id_asesor=$resultado1["id"];
                }
                
            }catch(PDOException $e){
                echo "Error: " .$e->getMessage();
            }
            
        }


        public function buscar_ases($id){
            try{
                $res1= $this->conectar()->query(
                    "SELECT * FROM asesor_curso WHERE id LIKE '$id_asesor' "
                );
                $res1->setfetchMode(\PDO::FETCH_OBJ);
                if ($res1->rowCount()){
                    return $res1->fetchAll();
                }
            }catch(PDOExcetptio $a){
                echo "Error: ".$a->getMessage();
            }
        }
    }
    
?>