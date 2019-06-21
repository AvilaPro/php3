<!DOCTYPE html>
<?php
include_once "asesor.php";
use Models\Asesor as C;



if(isset($_GET["idcurso"])){
    //echo "aqui";
    $curso= C::leerCurso($_GET["idcurso"]);
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="listado_cursos.php" method="POST">
            <input type="hidden" name="idcurso" value="<?php echo isset($curso->idcurso) ? $curso->idcurso : "" ?>">
            <input type="text" name="nombre" placeholder="Ingrese nombre" value="<?php echo isset($curso->nombre) ? $curso->nombre : "" ?>">
            <input type="text" name="precio" placeholder="Ingrese precio del curso" value="<?php echo isset($curso->precio) ? $curso->precio : "" ?>">
            <button type="submit" name="guardar3">Guardar Cambios</button>
        </form>
        
        
    </body>
</html>