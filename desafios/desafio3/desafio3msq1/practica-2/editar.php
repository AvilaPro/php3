<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
  include_once 'Usuario.php';
   use Models\Usuario;
   
   if( isset($_GET["id"]) ){
       
        $usuario = Usuario::leerUno($_GET["id"]);
        
   }
   
   if( isset($_POST["guardar"]) ){
       
       Usuario::actualizar($_GET["id"], $_POST["nombre"], $_POST["apellido"], $_POST["edad"], $_POST["fecha_nacimiento"]);
   }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modifcar</title>
    </head>
    <body>
        
        <form action="editar.php?id=<?php echo isset($_GET["id"]) ? $_GET["id"] : "" ?>" method="POST">
            <input type="text" name="nombre" placeholder="ingrese nombre" value="<?php echo isset($usuario->nombre) ? $usuario->nombre : "" ?>">
            <input type="text" name="apellido" placeholder="ingrese apellido" value="<?php echo isset($usuario->apellido) ? $usuario->apellido : "" ?>">
            <input type="number" name="edad" placeholder="ingrese la edad" value="<?php echo isset($usuario->edad) ? $usuario->edad : "" ?>">
            <input type="text" name="fecha_nacimiento" placeholder="fecha nacimiento" value="<?php echo isset($usuario->fecha_nacimiento) ? $usuario->fecha_nacimiento : "" ?>">
            <button type="submit"  name="guardar">Guardar</button>
        </form>
        
    </body>
</html>
