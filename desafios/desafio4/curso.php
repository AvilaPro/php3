<?php
    namespace Modelo;
    require "asesor.php";
    use Models\Asesor as A;

    class Curso extends A{
        const TBASESOR = "asesores";
        const TBCURSOS = "cursos";
        const TBASECUR = "asesor_curso";

        public static function eliminarCurso($id){
            try{
                $curso = "DELETE FROM ".self::TBCURSOS." WHERE idcurso =:id";
                $resultado = parent::conectar()->prepare($curso);
                $resultado->bindValue(":id", $id);
                $resultado->execute();
            }catch(PDOException $e){
                session_start();
                $_SESSION["error"] = $e->getMessage();
                header("Location: error1.php");
            }
        }

        public static function elimAsesor($claves){
            try{
                $asesor = "DELETE FROM ".self::TBASESOR." WHERE id IN(SELECT idasesor FROM ".self::TBASECUR." WHERE idcurso ='$claves'";
                $resultado2 = parent::conectar()->exec($asesor);
                return $resultado2;
            }catch(PDOException $e){
                session_start();
                $_SESSION["error"] = $e->getMessage();
                header("Location: error1.php");
            }   
        }

        public static function eliminarCursos_Check($claves){
            try{
                //con instrucciones preparadas 
                $cursos = "DELETE FROM ".self::TBCURSOS." WHERE idcurso =:id";
                $resultado = parent::conectar()->prepare($cursos);
                foreach($claves as $id){
                    $resultado->bindValue(":id", $id);
                    $resultado->execute();
                }
                //sin instrucciones preparadas 
                /* foreach($claves as $id){
                    $cursos = "DELETE FROM ".self::TBCURSOS." WHERE idcurso ='$id'";
                    $resultado = parent::conectar()->exec($cursos);
                } */
                return $resultado;
            }catch(PDOException $e){
                session_start();
                $_SESSION["error"] = $e->getMessage();
                header("Location: error1.php");
            }
        }
    }

?>