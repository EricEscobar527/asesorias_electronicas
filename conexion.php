<?php
include('datosConexion.php');
class Conexion{
    function Conectar(){

        try{
        $conexion = new PDO("mysql:host=".SERVER.";dbname=".DBNAME, USER, PASSWORD);
        return $conexion;
    }catch(Exception $error){
        die("Error: ".$error->getMessage());
    }
 }
}

?>