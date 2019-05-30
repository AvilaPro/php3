<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        error_reporting(E_ALL);

        ini_set('display_errors',1);
        //ini_set('error_reporting',E_ALL & ~E_WARNING & ~E_NOTICE);

        @include 'Error.php';

        echo @$nombre;
        
        function validarNumero($numero){
            if($numero < 0){
                throw new ValidarExcepcion("numero negativo:");
            }
            return "numero correcto!</br>";
        }
        try{
            echo validarNumero(9);
            echo "esta linea no se ejecuta!</br>";
        } catch (ValidarExcepcion $ex) {
            echo $ex->mensaje();
        }
        
        echo "hola mundo";
        ?>
    </body>
</html>
