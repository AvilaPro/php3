<!DOCTYPE html>
<?php
include_once "asesor.php";
use Models\Asesor as A;



if(isset($_GET["id"])){
    //echo "aqui";
    $asesor= A::leerUno($_GET["id"]);
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="listado_asesores.php" method="POST">
            <input type="hidden" name="id" value="<?php echo isset($asesor->id) ? $asesor->id : "" ?>">
            <input type="text" name="nombre" placeholder="Ingrese nombre" value="<?php echo isset($asesor->nombre) ? $asesor->nombre : "" ?>">
            <input type="text" name="correo" placeholder="Ingrese correo" value="<?php echo isset($asesor->correo) ? $asesor->correo : "" ?>">
            <input type="number" name="telefono" placeholder="Ingrese telefono" value="<?php echo isset($asesor->telefono) ? $asesor->telefono : "" ?>">
            <button type="submit" name="guardar1">Guardar Cambios</button>
        </form>
        
        
    </body>
</html>