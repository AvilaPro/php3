<!DOCTYPE html>
<?php
include 'curso.php';

use Modelo\Curso as C;

$curso = new C;

if(isset($_POST["eliminar"])){
    //print_r($_POST["idcurso"]);
    $elim = C::eliminarCurso($_POST["idcurso"]);
    C::elimAsesor($_POST["idcurso"]);
}

if(isset( $_POST["guardar2"])){
    $registrado = C::insertarCurso($_POST["nombre"], $_POST["precio"]);
}

if(isset($_POST["guardar3"])){
    C::actualizarCurso($_POST["idcurso"], $_POST["nombre"], $_POST["precio"]);
}

if(isset($_POST["borrar-varios1"])){
    if(isset($_POST["marcados1"])){
        /* print_r($_POST["marcados"]);
        $elimVarios = "1"; */
        $elimVarios = C::eliminarCursos_Check($_POST["marcados1"]);
    }else{
        $seleccionar = "Por favor debe seleccionar alguna casilla";
    }
    
}

$cursos= C::leerCursos();

?>




<html>
    <head>
        <meta charset="UTF-8">
        <title>Listado de Cursos</title>
    </head>
    <body>
        <span>
            <?php echo isset($seleccionar) ? $seleccionar : "" ?>
        </span>
        <span class="regist">
            <?php echo isset($elimVarios) ? "curso(s) eliminado(s) con exito" : "" ?>
        </span>
        <span class="regist">
            <?php echo isset($elim) ? "curso eliminado con exito" : "" ?>
        </span>
        <form action="listado_cursos.php" method="post">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($cursos as $curso): ?>
                    <tr>
                    <td><input type="checkbox" name="marcados1[]" value="<?= $curso->idcurso;?>"></td>
                        <td><?= $curso->idcurso;?></td>
                        <td><?= $curso->nombre;?></td>
                        <td><?= $curso->precio;?></td>
                        <td><a href="editar_curso.php?idcurso=<?= $curso->idcurso;?>">  Modificar </a></td>
                        <td>
                            <form method="POST" action='listado_cursos.php'>
                                <input type="hidden" value="<?= $curso->idcurso;?>" name="idcurso">
                                <button type="submit" name="eliminar">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <br>
            <button type="submit" name="borrar-varios1">Eliminar Curso(s)</button>
        </form>
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