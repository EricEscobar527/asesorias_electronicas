<?php
include ("conexion.php");

$usuario = $_POST['usuario'];

if (! $usuario){
  echo '<script>alert("Ingresa un nombre de usuario");parent.location = "menu-adm.php"</script>'; 
  exit;
}else{

   $objeto = new Conexion;
   $conexion = $objeto->Conectar();

    $actualizar = "UPDATE administrador SET usuario = '$usuario'";

   $ActualizarADM = $conexion->prepare($actualizar);
   $ActualizarADM->execute();

   

    if($ActualizarADM){
        echo '<script>alert("Usuario actualizado");parent.location = "menu-adm.php"</script>'; 
  }else{
    echo '<script>alert("Error al Actualizar");parent.location = "menu-adm.php"</script>'; 
  }
}
?>