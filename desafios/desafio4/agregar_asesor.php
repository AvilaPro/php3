<!DOCTYPE html>
<?php
include_once "asesor.php";
use Models\Asesor as A;
 
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Agregar Asesor</title>
    </head>
    <body>
        <form action="listado_asesores.php" method="POST">
            <input type="text" name="nombre" placeholder="Ingrese nombre">
            <input type="text" name="correo" placeholder="Ingrese correo">
            <input type="number" name="telefono" placeholder="Ingrese telefono">
            <button type="submit" name="guardar">Guardar</button>
        </form>
        <br>
        <br>
        <form action="listado_asesores.php">
            <span>Volver a la Lista de Asesores</span>
            <br>
            <input type="submit" value="Volver">
        </form>
        
    </body>
</html>
