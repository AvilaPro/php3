<!DOCTYPE html>
<?php
include 'asesor.php';

use Models\Asesor as A;

$ases = new A;

if(isset( $_POST["guardar"])){
    $registrado = A::insertar( $_POST["nombre"], $_POST["correo"], $_POST["telefono"]);
 }

if(isset($_POST["guardar1"])){
    A::actualizar($_POST["id"], $_POST["nombre"], $_POST["correo"], $_POST["telefono"]);
}

if(isset($_POST["borrar-varios"])){
    if(isset($_POST["marcados"])){
        /* print_r($_POST["marcados"]);
        $elimVarios = "1"; */
        $elimVarios = A::eliminarAsesor($_POST["marcados"]);
    }else{
        $seleccionar = "Por favor debe seleccionar alguna casilla";
    }
    
}

$asesores= A::leerTodos();

?>




<html>
    <head>
        <meta charset="UTF-8">
        <title>Listado de Asesores</title>
    </head>
    <body>
        <span>
            <?php echo isset($seleccionar) ? $seleccionar : "" ?>
        </span>
        <span class="regist">
            <?php echo isset($elimVarios) ? "usuario(s) eliminado(s) con exito" : "" ?>
        </span>
        <form action="listado_asesores.php" method="post">  
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Modificar</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($asesores as $ases): ?>
                    <tr>
                        <td><input type="checkbox" name="marcados[]" value="<?= $ases->id;?>"></td>
                        <td><?= $ases->id;?></td>
                        <td>
                            <a href="curso_asesor.php?id=<?= $ases->id;?>&nombre=<?=$ases->nombre;?>">
                                <?=$ases->nombre ?>
                            </a>
                        </td>
                        <td><?= $ases->correo;?></td>
                        <td><?= $ases->telefono;?></td>
                        <td><a href="editar.php?id=<?= $ases->id;?>">  Modificar </a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <br>
            <button type="submit" name="borrar-varios">Eliminar Asesor(es)</button>
        </form>
        <br>
        <br>
        <form action="agregar_asesor.php">
            <span>Agregar un nuevo Asesor</span>
            <br>
            <input type="submit" value="Agregar Asesor">
        </form>
        <br>
        <br>
        <form action="index.php">
            <span>Volver a la pagina Principal</span>
            <br>
            <input type="submit" value="Volver">
        </form>

            
    </body>
</html>