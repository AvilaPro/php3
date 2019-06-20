<!DOCTYPE html>
<?php
include 'asesor.php';

use Models\Asesor;

$as= new Asesor;
$ase =new Asesor;
$ases = new Asesor;


if (isset($_GET["name"])) {
	 	
    $buscado = $ase->buscar($_GET["name"]);
    $curso = $ase->buscar1($buscado->id);
    $c = $ase->buscar2($curso);
    
    
    print_r($buscado);
    echo "<br>";
    print_r($curso);
    echo "<br>";
    print_r($curso->idcurso);
    echo "<br>";
    print_r($c);
    if (isset($buscado1)) {
       
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
                    <th>Nombre Asesor</th>
                    <th>Curso</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($buscado as $ases): ?>
            <?php foreach ($c as $curs): ?>
                <tr>
                    <td><?= $ases->id;?></td>
                    <td><?= $ases->nombre;?></td>
                    <td><?= $curs->nombre;?></td>
                    <td><?= $curs->precio;?></td>
                </tr>
            <?php endforeach; ?>  
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