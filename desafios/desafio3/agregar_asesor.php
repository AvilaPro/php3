<!DOCTYPE html>
<?php
include_once "usuario.php";
use Models\Usuario as U;

if(isset( $_POST["guardar"])){
    $registrado = U::insertar( $_POST["nombre"], $_POST["apellido"], $_POST["edad"], $_POST["fecha"]);
 }
 
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
