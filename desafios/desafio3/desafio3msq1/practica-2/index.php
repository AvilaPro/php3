<?php 
include_once 'Usuario.php';
use Models\Usuario;

if( isset($_POST["guardar"]) ){
    
$registrado =  Usuario::insertar($_POST["nombre"], $_POST["apellido"], $_POST["edad"], $_POST["fecha_nacimiento"]);

}

if( isset($_GET["nombre"]) ){
    
    $usuarios = Usuario::buscar($_GET["nombre"]);
    
    if(is_null($usuarios )){
        $error = "No existen coincidencias!";
    }
    
}else{
   $usuarios = Usuario::leerTodos(); 
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <span> <?php echo isset($error) ? $error : "" ?> </span>
         <span> <?php echo isset($registrado) ? "usuario registrado con exito!" : "" ?> </span>
        <form method="GET" action="index.php">
            <input name="nombre" type="text" placeholder="nombre">
            <button type="submit">Buscar</button>
        </form>
         <table>
             <tr>
                 <td>Nombre</td>
                 
                 <td>Apellido</td>
                 
                 <td>Edad</td>
                 
                 <td>Fecha nacimiento</td>
                 
                 <td></td>
             </tr>
             <?php 
             foreach ($usuarios as $usuario){
                 echo "<tr>";
                 echo "<td>$usuario->nombre</td>";
                 
                 echo "<td>$usuario->apellido</td>";
                 
                 echo "<td>$usuario->edad</td>";
                 
                 echo "<td>$usuario->fecha_nacimiento</td>";
                 
                 echo "<td><a href='editar.php?id=$usuario->id'>Modificar</a></td>";
                 echo "</tr>";
             }
                 
             ?>
         </table>
        
        <form action="index.php" method="POST">
            <input type="text" name="nombre" placeholder="ingrese nombre">
            <input type="text" name="apellido" placeholder="ingrese apellido">
            <input type="number" name="edad" placeholder="ingrese la edad">
            <input type="text" name="fecha_nacimiento" placeholder="fecha nacimiento">
            <button type="submit"  name="guardar">Guardar</button>
        </form>
        
    </body>
</html>
