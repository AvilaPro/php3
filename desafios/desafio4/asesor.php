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

        public static function insertarCurso($nombre, $precio){
            try{
                $curso = "INSERT INTO ".self::TBCURSOS." " 
                            ."(nombre, precio) "
                            ."VALUES('$nombre', '$precio')";
                $resultado = parent::conectar()->exec($curso);
            }catch (\PDOException $e){
                session_start();
                $_SESSION["error"] = $e->getMessage();
                header("Location: error1.php");
            }
        }

        public static function insertarCurso_Asesor($idasesor, $idcurso){
            try{
                $curso = "INSERT INTO ".self::TBASECUR." " 
                            ."(idasesor, idcurso) "
                            ."VALUES('$idasesor', '$idcurso')";
                $resultado = parent::conectar()->exec($curso);
                return true;
            }catch (\PDOException $e){
                session_start();
                $_SESSION["error"] = $e->getMessage();
                header("Location: error1.php");
            }
        }
    
        public static function actualizar($id, $nombre, $correo, $telefono){
            try{
                $asesor = "UPDATE ".self::TBASESOR
                ." SET nombre='$nombre', correo='$correo', telefono='$telefono' WHERE id='$id'";
                $resultado = parent::conectar()->exec($asesor);
            }catch (\PDOException $e){
                session_start();
                $_SESSION["error"] = $e->getMessage();
                header("Location: error1.php");
            }
        }

        public static function actualizarCurso($idcurso, $nombre, $precio){
            try{
                $curso = "UPDATE ".self::TBCURSOS
                ." SET nombre='$nombre', precio='$precio' WHERE idcurso='$idcurso'";
                $resultado = parent::conectar()->exec($curso);
            }catch (\PDOException $e){
                session_start();
                $_SESSION["error"] = $e->getMessage();
                header("Location: error1.php");
            }
        }
    
        public static function leerUno($id){
            try{
                $resultado = parent::conectar()->query("SELECT * FROM ".self::TBASESOR." WHERE id ='$id'");
                $resultado->setfetchMode(\PDO::FETCH_OBJ);
                return $resultado->fetch();
            }catch (PDOException $e){
                session_start();
                $_SESSION["error"] = $e->getMessage();
                header("Location: error1.php");
            }
        }

        public static function leerCurso($id){
            try{
                $resultado = parent::conectar()->query("SELECT * FROM ".self::TBCURSOS." WHERE idcurso ='$id'");
                $resultado->setfetchMode(\PDO::FETCH_OBJ);
                return $resultado->fetch();
            }catch (PDOException $e){
                session_start();
                $_SESSION["error"] = $e->getMessage();
                header("Location: error1.php");
            }
        }

        public static function consultarCursosXAsesor($idAsesor){
            $query = parent::conectar()->query(
                "SELECT 
                    cursos.nombre AS nombreCurso, 
                    cursos.precio AS precio
                FROM 
                    asesor_curso
                INNER JOIN
                    cursos
                ON
                    cursos.idcurso = asesor_curso.idcurso
                WHERE idasesor = $idAsesor"
            );
            $resultado = $query->setFetchMode(\PDO::FETCH_ASSOC);
            $resultado = $query->fetchAll();
            if ($resultado) {
                return $resultado;
            }else{
                return false;
            }
        }
            
        public static function eliminarAsesor($claves){
            try{
                //con instrucciones preparadas 
                $asesor = "DELETE FROM ".self::TBASESOR." WHERE id =:id";
                $resultado = parent::conectar()->prepare($asesor);
                foreach($claves as $id){
                    //la diferencia de bindValue a bindParam pareciera no ser muy trascendental aqui
                    //ya que bindValue Vincula un valor a un parámetro y 
                    //bindParam Vincula un parámetro al nombre de variable especificado
                    $resultado->bindValue(":id", $id);
                    $resultado->execute();
                }
                //sin instrucciones preparadas 
                /* foreach($claves as $id){
                    $asesor = "DELETE FROM ".self::TBASESOR." WHERE id ='$id'";
                    $resultado = parent::conectar()->exec($asesor);
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