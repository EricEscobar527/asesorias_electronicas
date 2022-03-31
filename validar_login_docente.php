<?php
$matricula = $_POST['matricula'];
$contraseña = $_POST['contraseña'];
session_start();
$_SESSION['matricula']=$matricula;

include ("conexion.php");

$objeto = new Conexion;
$conexion = $objeto->Conectar();

$consulta = "SELECT * FROM docentes WHERE matricula = '$matricula' AND contraseña = '$contraseña'"; 

$resultado = $conexion->prepare($consulta);
$resultado->execute();

$filas = $resultado->fetch(PDO::FETCH_ASSOC);

if($filas && $filas['estatus'] == 'activo' ){
    header("location:menu-docente.php");
}
else{
    ?> 
    <?php
    echo '<script>alert("Los datos ingresados son incorrectos o el usuario esta inactivo");parent.location = "login-docente.php"</script>'; 
    ?>
    <?php
};
