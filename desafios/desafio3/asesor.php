<?php
    namespace Models;
    session_start();
    require "database.php";
    use DB\Database;

    class Asesor extends Database{
        const TBASESOR = "asesores";
        const TBCURSOS = "cursos";
        const TBASECUR = "asesor_curso";


        /* private $table;
        private $curso;
        private $asesor_curso;

        public function __construct(){
            $this->table ="asesores";
            $this->curso ="cursos";
            $this->asesor_curso = "asesor_curso"; } */
        

        public static function leerTodos(){
            try{
                $resultado = parent::conectar()->query(
                    "SELECT * FROM ".self::TBASESOR
                );
                $resultado->setfetchMode(\PDO::FETCH_OBJ);
                return $resultado->fetchAll();
            }catch(PDOException $e){
                session_start();
                $_SESSION["error"] = $e->getMessage();
                header("Location: error1.php");
                //echo "Error: " .$e->getMessage();
            }
        }

        public static function leerCursos(){
            try{
                $resultado2 = parent::conectar()->query(
                    "SELECT * FROM ".self::TBCURSOS
                );
                $resultado2->setfetchMode(\PDO::FETCH_OBJ);
                return $resultado2->fetchAll();
            }catch(PDOException $e){
                session_start();
                $_SESSION["error"] = $e->getMessage();
                header("Location: error1.php");
                //echo "Error: " .$e->getMessage();
            }
        }

        public static function buscar($nombre){
            try{
                $resultado1 = parent::conectar()->query(
                    "SELECT * FROM ".self::TBASESOR." WHERE nombre LIKE '%$nombre%'"
                );
                $resultado1->setfetchMode(\PDO::FETCH_OBJ);
                if ($resultado1->rowCount()) {
                    return $resultado1->fetchAll();
                }else{
                    return null;
                }
                
            }catch(PDOException $e){
                session_start();
                $_SESSION["error"] = $e->getMessage();
                header("Location: error1.php");
                //echo "Error: " .$e->getMessage();
            }
            
        }

        public static function insertar($nombre, $correo, $telefono){
            try{
                $asesor = "INSERT INTO ".self::TBASESOR." " 
                            ."(nombre, correo, telefono) "
                            ."VALUES('$nombre', '$correo', '$telefono')";
                $resultado = parent::conectar()->exec($asesor);
            }catch (\PDOException $e){
                session_start();
                $_SESSION["error"] = $e->getMessage();
                header("Location: error1.php");
            }
        }
    
        public static function actualizar($id, $nombre, $correo, $telefono){
            try{
                $asesor = "UPDATE ".self::TBUSUARIO
                ." SET nombre='$nombre', correo='$correo', telefono='$telefono' WHERE id='%$id%'";
                $resultado = parent::conectar()->exec($asesor);
            }catch (\PDOException $e){
                session_start();
                $_SESSION["error"] = $e->getMessage();
                header("Location: error1.php");
            }
        }
    
        public static function leerUno($id){
            try{
                $resultado = parent::conectar()->query(
                    "SELECT * FROM ".self::TBUSUARIO." WHERE id ='%$id%'");
                $resultado->setfetchMode(\PDO::FETCH_OBJ);
                return $resultado->fetch();
            }catch (PDOException $e){
                session_start();
                $_SESSION["error"] = $e->getMessage();
                header("Location: error1.php");
            }
        }

        public static function buscar1($nombre){
            try{
                $resultado1 = parent::conectar()->query(
                    "SELECT * FROM ".self::TBASECUR." WHERE idasesor LIKE '%$nombre%'"
                );
                $resultado1->setfetchMode(\PDO::FETCH_OBJ);
                if ($resultado1->rowCount()) {
                    return $resultado1->fetchAll();
                }
                
            }catch(PDOException $e){
                session_start();
                $_SESSION["error"] = $e->getMessage();
                header("Location: error1.php");
                //echo "Error: " .$e->getMessage();
            }      
        }



        public static function buscar2($nombre){
            try{
                foreach ($nombre->idcurso as $n) {
                    $resultado1 = parent::conectar()->query(
                        "SELECT * FROM ".self::TBCURSOS." WHERE idcurso LIKE '%$n%'"
                    );
                }
                $resultado1->setfetchMode(\PDO::FETCH_OBJ);
                    if ($resultado1->rowCount()) {
                        return $resultado1->fetchAll();
                    }
                
                
            }catch(PDOException $e){
                session_start();
                $_SESSION["error"] = $e->getMessage();
                header("Location: error1.php");
                //echo "Error: " .$e->getMessage();
            }
            
        }
    }
    

    
?>