<?php
    include ("conexion.php");
    error_reporting(0);

    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido1'];
    $apellido_materno = $_POST['apellido2'];
    $matricula = $_POST['matricula'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $estatus = $_POST['estatus'];


   $objeto = new Conexion;
   $conexion = $objeto->Conectar();

    $actualizar = "UPDATE docentes SET nombre = '$nombre', apellido_paterno = '$apellido_paterno', apellido_materno = '$apellido_materno', contraseña = '$contraseña', matricula = '$matricula', correo = '$correo', estatus = '$estatus' WHERE matricula = '$matricula'";

   $ActualizarDocente = $conexion->prepare($actualizar);
   $ActualizarDocente->execute();

   

    if($ActualizarDocente){
        echo '<script>alert("Usuario Actualizado");parent.location = "menu-adm.php"</script>'; 
  }else{
    echo '<script> alert("Error al Actualizar");parent.location = "menu-adm.php"</script>';
  }

?>