<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include 'asesor.php';

use Models\Asesor;

$as= new Asesor;
$ase = new Asesor;



?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
            <form action="index.php" method="get">
                <label for="">Asesores:</label>
                <select name="asesores" id="">
                    <?php 
                    foreach ($as->leerTodos() as $user) {
                        echo "<option value='$user->id'>";
                        echo $user->nombre;
                        echo "</option>";
                    }
                    ?>
                </select>
                <label for="">Cursos:</label>
                <select name="cursos" id="">
                    <?php 
                    foreach ($ase->leerCursos() as $curs) {
                        echo "<option value='$curs->idcurso'>";
                        echo $curs->nombre;
                        echo "</option>";
                    }
                    ?>
                </select>
                <button type="submit">Cargar Curso al Asesor</button>
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