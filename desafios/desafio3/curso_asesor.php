<?php
        require_once 'asesor.php';
        use Models\Asesor as A;

        $obj_asesor = new A;

        $resultado = $obj_asesor->consultarCursosXAsesor($_GET['id']);
        if ($resultado) {
            $cursos = $resultado;
        }
 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cursos que dicta el Asesor</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th colspan="2">Asesor:</th>
            </tr>
            <tr>
                <td style="text-align:center;" colspan="2"><?= $_GET['nombre'];?></td style="text-align:center;">
            </tr>
            <tr>
                <th colspan="2">Cursos Dictados</th>
            </tr>
        <?php if(isset($cursos)):?>
            <tr>
                <th>Nombre del Curso</th>
                <th>Precio del curso</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($cursos as $curso):?>
            <tr>
                <td><?=$curso['nombreCurso'];?></td>
                <td><?=$curso['precio'];?></td>
            </tr>
        <?php endforeach;?>
        <?php else:?>
            <tr>
                <td colspan="2">Actualmente no dicta Cursos</td>
            </tr>
        <?php endif;?>
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