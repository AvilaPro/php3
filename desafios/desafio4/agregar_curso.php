<!DOCTYPE html>
<?php
include_once "asesor.php";
use Models\Asesor as C;
 
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Agregar Curso</title>
    </head>
    <body>
        <form action="listado_cursos.php" method="POST">
            <input type="text" name="nombre" placeholder="Ingrese nombre">
            <input type="text" name="precio" placeholder="Ingrese precio del curso">
            <button type="submit" name="guardar2">Guardar</button>
        </form>
        <br>
        <br>
        <form action="listado_cursos.php">
            <span>Volver a la Lista de Cursos</span>
            <br>
            <input type="submit" value="Volver">
        </form>
    </body>
</html>