<!DOCTYPE html>
<?php
include 'asesor.php';

use Models\Asesor;

$as= new Asesor;
$ase = new Asesor;
$ases = new Asesor;

$asesores= $as->leerTodos();

?>




<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>telefono</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($asesores as $ases): ?>
                <tr>
                    <td><?= $ases->id;?></td>
                    <td>
                        <form action="curso_asesor.php" method="get">
                            <button type="submit" name="name" value="<?= $ases->nombre?>"><?= $ases->nombre;?></button>
                        </form>
                    </td>
                    <td><?= $ases->correo;?></td>
                    <td><?= $ases->telefono;?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <br>
        <form action="index.php">
            <span>Volver a la pagina Principal</span>
            <br>
            <input type="submit" value="Volver">
        </form>

            
    </body>
</html>