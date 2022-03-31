<?php
include ("conexion.php");
$contraseña = $_POST['contraseña'];

if (! $contraseña){
  echo '<script>alert("Ingresa una contraseña");parent.location = "menu-adm.php"</script>'; 
  exit;
}else{

   $objeto = new Conexion;
   $conexion = $objeto->Conectar();

    $actualizar = "UPDATE administrador SET contraseña = '$contraseña'";

   $ActualizarADM = $conexion->prepare($actualizar);
   $ActualizarADM->execute();

   

    if($ActualizarADM){
        echo '<script>alert("Contraseña actualizada");parent.location = "menu-adm.php"</script>'; 
  }else{
    echo '<script>alert("Error al Actualizar");parent.location = "menu-adm.php"</script>'; 
  }
}
?>