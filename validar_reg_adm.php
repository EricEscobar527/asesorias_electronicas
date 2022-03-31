<?php
    include('conexion.php');

    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
   

    
   $objeto = new Conexion;
   $conexion = $objeto->Conectar();

   $insertar = "INSERT INTO administrador VALUES ('$usuario', '$contraseña')";

   $resultado = $conexion->prepare($insertar);
   $resultado->execute();

    
    if($resultado){
        echo '<script>alert("Usuario registrado");parent.location = "login-adm.php"</script>'; 

  }else{
    echo '<script>alert("Error al registrar");parent.location = "registrar_adm.php"</script>'; 
  }
?>