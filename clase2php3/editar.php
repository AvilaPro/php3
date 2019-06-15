<!DOCTYPE html>
<?php
include_once "usuario.php";
use Models\Usuario;

if(isset($_POST["guardar"])){
    Usuario::actualizar($_GET["id"], $_POST["nombre"], $_POST["apellido"], $_POST["edad"], $_POST["fecha"]);
}

if(isset($_GET["id"])){
    echo "aqui";
    $usuario= Usuario::leerUno($_GET["id"]);
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="editar.php?id=<?php echo isset($_GET["id"]) ? $_GET["id"] : ""; ?>" method="POST">
            <input type="text" name="nombre" placeholder="Ingrese nombre" value="<?php echo isset($usuario->nombre) ? $usuario->nombre : "" ?>">
            <input type="text" name="apellido" placeholder="Ingrese apellido" value="<?php echo isset($usuario->apellido) ? $usuario->apellido : "" ?>">
            <input type="number" name="edad" placeholder="Ingrese edad" value="<?php echo isset($usuario->edad) ? $usuario->edad : "" ?>">
            <input type="text" name="fecha" placeholder="fecha de nacimiento" value="<?php echo isset($usuario->fecha_nacimiento) ? $usuario->fecha_nacimiento : "" ?>">
            <button type="submit" name="guardar">Guardar</button>
        </form>
        
    </body>
</html>
