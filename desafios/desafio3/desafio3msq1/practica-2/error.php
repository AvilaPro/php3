<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Error</title>
        <style>
            .error{
                background-color: red;
                color:white;
                display: flex;
                justify-content: center;
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <?php session_start(); ?>
        <span class="error">Error: <?php echo isset($_SESSION["error"]) ? $_SESSION["error"] : "" ?></span>
        <?php session_destroy(); ?>
    </body>
</html>
