<!DOCTYPE html>
<?php
include 'asesor.php';

use Models\Asesor as A;

$curso = new A;

if(isset($_POST["guardar4"])){
    //print_r($_POST);
    $asignado = A::insertarCurso_Asesor($_POST["idasesor"], $_POST["idcurso"]);

}


?>




<html>
    <head>
        <meta charset="UTF-8">
        <title>Asignar Curso a Asesor</title>
    </head>
    <body>
        <style>
            .regist{
                
                color: green;
                display: flex;
                justify-content: center;
                padding: 20px;
            }
        </style>
        <span class="regist"><?php echo isset($asignado) ? "CURSO ASIGNADO AL ASESOR CON EXITO" : "" ?></span>
        <form action="asignar_asesor_curso.php" method="post">
            <label for="">Asesores:</label>
            <select name="idasesor" id="">
                <?php 
                    foreach (A::leerTodos() as $ase) {
                        echo "<option value='$ase->id'>";
                        echo $ase->nombre;
                        echo "</option>";
                    }
                ?>
            </select>
            <label for="">Cursos:</label>
            <select name="idcurso" id="">
                <?php 
                    foreach (A::leerCursos() as $curs) {
                        echo "<option value='$curs->idcurso'>";
                        echo $curs->nombre;
                        echo "</option>";
                    }
                ?>
            </select>
            <br>
            <button type="submit" name="guardar4">Asignar</button>
        </form>
        
        <br>
        <br>
        <form action="index.php">
            <span>Volver a la pagina Principal</span>
            <br>
            <input type="submit" value="Volver">
        </form>

            
    </body>
</html>