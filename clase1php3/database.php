<?php
class Conexion{
    public function conectar(){
        try{
            $dsn = "mysql:host=localhost;dbname=db_cadif1";
            $usuario = "root";
            $pass = "";
            
            $conexion =  new PDO($dsn, $usuario, $pass);
            echo "<h1 style=color:green>conexion exitosa</h1>";    
            
            return $conexion;
            
        } catch (PDOException $e) {
            echo "Error".$e->getMessage();
        }
    }
}

$conexion = new Conexion();

$conexion->conectar();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

