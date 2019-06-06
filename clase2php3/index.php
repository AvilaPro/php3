<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once "usuario.php";
use Models\Usuario as U;

$usuarios = new U;


if(isset ($_GET["nombre"])) {
    $usuarios= $usuarios->buscar($_GET["nombre"]);
    if(is_null($usuarios)){
        $error = "No existe ese dato";
    }
}else{
    $usuarios = $usuarios->leerTodos();
}

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <span><?php echo isset($error) ? $error: "" ?></span>
        <form method"GET" action="index.php">
            <input type="text" name="nombre" placeholder="nombre">
            <input type="submit" value="Buscar">
        </form>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Fecha de Nacimiento</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($usuarios as $user): ?>
                <tr>
                    <td><?= $user->nombre;?></td>
                    <td><?= $user->apellido;?></td>
                    <td><?= $user->edad;?></td>
                    <td><?= $user->fecha_nacimiento;?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    
        <!-- <pre>
        <?php
        //foreach ($usuarios as $key) {
            //echo $key->nombre." ".$key->apellido;
           // echo "<br>";
        //}
            //print_r($usuarios);
        ?>
        </pre> -->
    </body>
</html>