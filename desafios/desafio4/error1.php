<?php
session_start();
?>



<html>
    <body>
        <style>
            .error{
                background-color:red;
                color: white;
                display: flex;
                justify-content: center;
                padding: 20px;
            }
        </style>
        <span class="error">Error: <?php echo isset($_SESSION["error"]) ? $_SESSION["error"] : ""; ?></span>
        <br>
        <br>
        <h1 class="error">Si ya corrigio el error de click en el siguiente boton:</h1>
        <form action="index.php">
            <input type="submit" value="Ir a Index">
        </form>
    </body>
</html>
<?php session_destroy(); ?>