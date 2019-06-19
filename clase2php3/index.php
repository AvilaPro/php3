<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once "usuario.php";
use Models\Usuario as U;

//$conexion = new U;

//add clase 4

if(isset($_POST["eliminar"])){
    U::eliminar($_POST["id"]);
}

if(isset($_POST["borrar-varios"])){
    if(isset($_POST["marcados"])){
        //print_r($_POST["marcados"]);
        $elimVarios = U::eliminarMarcados($_POST["marcados"]);
    }else{
        $seleccionar = "Por favor debe seleccionar alguna casilla";
    }
    
}


if(isset( $_POST["guardar"])){
   $registrado = U::insertar( $_POST["nombre"], $_POST["apellido"], $_POST["edad"], $_POST["fecha"]);
}

if(isset ($_GET["nombre"])) {
    $usuarios= U::buscar($_GET["nombre"]);
    if(is_null($usuarios)){
        $error = "No existe ese dato";
    }
}else{
    $usuarios = U::leerTodos();
}

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <style>
            .regist{
                background-color:green;
                color: white;
                display: flex;
                justify-content: center;
                padding: 20px;
            }
        </style>
        <span><?php echo isset($seleccionar) ? $seleccionar : "" ?></span>
        <span><?php echo isset($error) ? $error : "" ?></span>
        <span class="regist"><?php echo isset($registrado) ? "usuario registrado con exito" : "" ?></span>
        <span class="regist"><?php echo isset($elimVarios) ? "usuario(s) eliminado(s) con exito" : "" ?></span>
        <form method="GET" action="index.php">
            <input type="text" name="nombre" placeholder="nombre">
            <input type="submit" value="Buscar">
        </form>
        <form action="index.php" method="get">
                <label for="">Usuarios:</label>
                <select name="ususarios" id="">
                    <?php 
                    foreach (U::leerTodos() as $user) {
                        echo "<option value='$user->id'>";
                        echo $user->nombre;
                        echo "</option>";
                    }
                    ?>
            </select>
        </form>

        <form action="index.php" method="POST">
            <input type="text" name="nombre" placeholder="Ingrese nombre">
            <input type="text" name="apellido" placeholder="Ingrese apellido">
            <input type="number" name="edad" placeholder="Ingrese edad">
            <input type="text" name="fecha" placeholder="fecha de nacimiento">
            <button type="submit" name="guardar">Guardar</button>
        </form>
        <form action="index.php" method="post">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Edad</th>
                        <th>Fecha de Nacimiento</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($usuarios as $user): ?>
                    <tr>
                        <td><input type="checkbox" name="marcados[]" value="<?= $user->id;?>"></td>
                        <td><?= $user->nombre;?></td>
                        <td><?= $user->apellido;?></td>
                        <td><?= $user->edad;?></td>
                        <td><?= $user->fecha_nacimiento;?></td>
                        <td><a href="editar.php?id=<?= $user->id;?>">  Modificar </a></td>
                        <td>
                            <form action="POST" action='index.php'>
                                <input type="hidden" value="<?= $user->id;?>" name="id">
                                <button type="submit" name="eliminar">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody> 
            </table>
            <button type="submit" name="borrar-varios">Eliminar varios</button>
        </form>
        
    
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