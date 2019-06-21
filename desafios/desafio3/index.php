<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Desafio 3 PHP 3</title>
        <link href="css/main.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
            <figure>
                <img alt="logo" id="imglogo" src="img/logo.png" title="logo">
            </figure>
            <nav>
                <ul>
                    <li>
                        <a href="#">Inicio</a>
                    </li>
                    <li>
                        <a href="#">Ver Asesores</a>
                    </li>
                    <li>
                        <a href="#">Ver Cursos</a>
                    </li>
                    <li>
                        <a href="#">Asignar Asesores a Curso</a>
                    </li>
                </ul>
            </nav>
        </header>
        <section class="galeria">
            <div class="galeria-nombre">
                <h1 class="galeria-nombre-p">Edicion de Cursos</h1>
            </div>
            <div class="galeria-contenedor">
                <article class="galeria-contenedor-articulo1">
                    <div class="galeria-contenedor-articulo1-imagen1">
                        <a href="#">
                            <img alt="proy1" id="imgport" src="img/proyecto-1.jpg" title="proy1">
                            <div class="galeria-contenedor-articulo1-imagen1-p1">
                                <p id="p1">Pagina Principal</p>
                            </div>
                            <div class="oculto1">
                                <p>Aqui se muestra la pagina principal</p>
                            </div>
                        </a>
                    </div>
                </article>
            
                <article class="galeria-contenedor-articulo1">
                    <div class="galeria-contenedor-articulo1-imagen1">
                        <a href="listado_asesores.php">
                        <img alt="proy2" id="imgport" src="img/proyecto-2.jpg" title="proy2">
                        <div class="galeria-contenedor-articulo1-imagen1-p2">
                            <p id="p1">Ver Asesores</p>
                        </div>
                        <div class="oculto2">
                            <p>Desde este enlace podra ver los asesores de la academia</p>
                        </div>
                        </a>
                    </div>
                </article>
                
                <article class="galeria-contenedor-articulo1">
                    <div class="galeria-contenedor-articulo1-imagen1">
                        <a href="listado_cursos.php">
                            <img alt="proy3" id="imgport" src="img/proyecto-3.jpg" title="proy3">
                            <div class="galeria-contenedor-articulo1-imagen1-p3">
                                <p id="p1">Ver cursos</p>
                            </div>
                            <div class="oculto3">
                                <p>Desde este enlace podra ver los cursos de la academia</p>
                            </div>
                        </a>
                    </div>
                </article>

                <article class="galeria-contenedor-articulo1">
                    <div class="galeria-contenedor-articulo1-imagen1">
                        <a href="asignar_asesor_curso.php">
                            <img alt="proy4" id="imgport" src="img/proyecto-4.jpg" title="proy4">
                            <div class="galeria-contenedor-articulo1-imagen1-p4">
                                <p id="p1">Asignar Curso a Asesor</p>
                            </div>
                            <div class="oculto4">
                                <p>Desde aqui podra asignarle algun curso a algun asesor de la academia</p>
                            </div>
                        </a>
                    </div>
                </article>
            </div>
        </section>
        <?php
        // put your code here
        ?>
    </body>
</html>
