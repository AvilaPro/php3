<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

@include 'conexion.php';

if(isset($_POST["verificar"])){
    $dsn=$_POST["dsn"];
    $usuario=$_POST["user"]; //el usuario correcto es root
    $password=$_POST["pass"]; //el password correcto es dejarlo vacio
    $dsn1="mysql:host=localhost;dbname=".$dsn;

    ini_set('error_reporting',E_ALL); //seteo del error_reporting


    $conect= new Conexion();

    $conect-> conectar($dsn1,$usuario,$password);

    
}
?>


<html>
    <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Desafio 1 PHP 3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/desafio1.css" />
    </head>
    <body>
        <header>
            <figure>
                <img src="img/logo-cadif1.jpg">
            </figure>
        </header>
        <section>
            <div id="contenedor-form">
                <form action="index.php" method="POST">
                    <div class="div-codigo">
                        <p>Ingrese el nombre de la base de datos</p>
                        <input type="text" name="dsn" class="incodigo" placeholder="Nombre de la Base de Datos" id="inputtext" >
                    </div>
                    <div class="div-nombre">
                        <p>Ingrese el Usuario</p>
                        <input type="text" name="user" class="innombre" placeholder="Usuario" id="inputtext">
                    </div>
                    <div class="div-existencia">
                        <p>Ingrese la Contraseña</p>
                        <input type="text" name="pass" class="inexistencia" placeholder="" id="inputtext">
                    </div>
                    <br><br>
                    <div class="div-button" id="boton1">
                        <input type="submit" name="verificar" value="Verificar Conexion"  class="boton" >
                    </div>
                </form>
            </div>
            
        
    </body>
</html>