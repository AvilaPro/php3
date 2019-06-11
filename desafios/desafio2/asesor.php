<?php
    namespace Models;
    require "database.php";
    use Database;

    class Asesor extends Database{
        private $table;
        private $curso;
        private $asesor_curso;

        public function __construct(){
            $this->table ="asesores";
            $this->curso ="cursos";
            $this->asesor_curso = "asesor_curso";
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

        public function leerCursos(){
            try{
                $resultado2 = $this->conectar()->query(
                    "SELECT * FROM $this->curso"
                );
                $resultado2->setfetchMode(\PDO::FETCH_OBJ);
                return $resultado2->fetchAll();
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
                }
                
            }catch(PDOException $e){
                echo "Error: " .$e->getMessage();
            }
            
        }

        public function buscar1($nombre){
            try{
                $resultado1 = $this->conectar()->query(
                    "SELECT * FROM $this->asesor_curso WHERE idasesor LIKE '%$nombre%'"
                );
                $resultado1->setfetchMode(\PDO::FETCH_OBJ);
                if ($resultado1->rowCount()) {
                    return $resultado1->fetchAll();
                }
                
            }catch(PDOException $e){
                echo "Error: " .$e->getMessage();
            }
            
        }



        public function buscar2($nombre){
            try{
                foreach ($nombre->idcurso as $n) {
                    $resultado1 = $this->conectar()->query(
                        "SELECT * FROM $this->curso WHERE idcurso LIKE '%$n%'"
                    );
                }
                $resultado1->setfetchMode(\PDO::FETCH_OBJ);
                    if ($resultado1->rowCount()) {
                        return $resultado1->fetchAll();
                    }
                
                
            }catch(PDOException $e){
                echo "Error: " .$e->getMessage();
            }
            
        }
    }
    

    
?>