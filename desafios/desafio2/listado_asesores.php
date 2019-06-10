<!DOCTYPE html>
<?php
include 'asesor.php';

use Models\Asesor;

$as= new Asesor;
$ase = new Asesor;
$ases = new Asesor;

$asesores= $as->leerTodos();

print_r($_GET);

if (isset($_GET["name"])) {
	 	
    $buscado = $ase->buscar($_GET["name"]);
    print_r($buscado);
    

    if (isset($buscado)) {
        $buscar_asesor = $ase->buscar_ases($buscado["id"]);
        print_r($buscar_asesor);
    }
} 

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
                        <form action="listado_asesores.php" method="get">
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