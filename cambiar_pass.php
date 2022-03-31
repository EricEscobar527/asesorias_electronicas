<?php
    include ("conexion.php");
    $contraseña = $_POST['contraseña'];
    $matricula = $_GET["matricula"];

    if (! $contraseña){
      echo '<script>alert("Ingresa una contraseña");parent.location = "menu-docente.php"</script>'; 
      exit;
    }else{

   $objeto = new Conexion;
   $conexion = $objeto->Conectar();

    $actualizar = "UPDATE docentes SET contraseña = '$contraseña' WHERE matricula = '$matricula'";

   $ActualizarDocente = $conexion->prepare($actualizar);
   $ActualizarDocente->execute();

   

    if($ActualizarDocente){
        echo '<script>alert("Contraseña actualizada");parent.location = "menu-docente.php"</script>'; 
  }else{
    echo '<script>alert("Error al Actualizar");parent.location = "menu-docente.php"</script>'; 
  }

}
?>