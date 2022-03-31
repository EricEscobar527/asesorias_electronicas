<?php
include('conexion.php');

if(isset($_POST['submit'])){

 $matricula = $_POST['matricula'];
 $nombre = $_POST['nombre_alumno'];
 $tipo = $_POST['tipo'];
 $para = $_POST['para'];
 $tema = $_POST['tema'];
 $hora_inicio = $_POST['hora_inicio'];
 $hora_final = $_POST['hora_termino'];
 $genero = $_POST['genero'];
 $docente_matricula = $_GET["docente_matricula"];
 $fecha = $_POST['fecha_asesoria'];

$objeto = new Conexion;
$conexion = $objeto->Conectar();

 $insertar = "INSERT INTO asesoria Values ('$matricula', '$nombre', '$fecha', '$tipo', '$para', '$tema', '$hora_inicio', '$hora_final', '$genero', '$docente_matricula')";

$resultado = $conexion->prepare($insertar);
$resultado->execute();

 $query = $resultado;
 if ($query){
    echo '<script>alert("Asesoria Guardada");parent.location = "menu-docente.php"</script>'; 
    
 }else{
    echo '<script>alert("Error al guardar");parent.location = "menu-docente.php"</script>'; 
 }
        }
    
        ?>