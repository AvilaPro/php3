<!DOCTYPE html>
<?php
include 'asesor.php';

use Models\Asesor as C;

$curso = new C;

if(isset( $_POST["guardar2"])){
    $registrado = C::insertarCurso($_POST["nombre"], $_POST["precio"]);
}

if(isset($_POST["guardar3"])){
    C::actualizarCurso($_POST["idcurso"], $_POST["nombre"], $_POST["precio"]);
}

$cursos= C::leerCursos();

?>




<html>
    <head>
        <meta charset="UTF-8">
        <title>Listado de Cursos</title>
    </head>
    <body>
        
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Modificar</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($cursos as $curso): ?>
                <tr>
                    <td><?= $curso->idcurso;?></td>
                    <td><?= $curso->nombre;?></td>
                    <td><?= $curso->precio;?></td>
                    <td><a href="editar_curso.php?idcurso=<?= $curso->idcurso;?>">  Modificar </a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <br>
        <form action="agregar_curso.php">
            <span>Agregar un nuevo Curso</span>
            <br>
            <input type="submit" value="Agregar Curso">
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