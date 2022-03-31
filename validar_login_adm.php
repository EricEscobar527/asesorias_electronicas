<?php
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;

include ("conexion.php");

$objeto = new Conexion;
$conexion = $objeto->Conectar();

$consulta = "SELECT * FROM administrador WHERE usuario = '$usuario' AND contraseña = '$contraseña'"; 

$resultado = $conexion->prepare($consulta);
$resultado->execute();

$filas = $resultado->fetch(PDO::FETCH_ASSOC);

if($filas){
    header("location:menu-adm.php");
}else{
    ?> 
    <?php
    echo '<script>alert("Error de autentificación");parent.location = "login-adm.php"</script>'; 
    ?>
    <?php
};
