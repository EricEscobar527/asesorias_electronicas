<?php
    include('conexion.php');
    if (isset($_POST['submit'])){

    $nombredocente = $_POST['nombredocente'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $matriculadocente = $_POST['matriculadocente'];
    $correodocente = $_POST['correodocente'];
    $contraseñadocente = $_POST['contraseñadocente'];
    
   $objeto = new Conexion;
   $conexion = $objeto->Conectar();

   $insertar = "INSERT INTO docentes VALUES ('$matriculadocente', '$nombredocente', '$apellido_paterno', '$apellido_materno', '$contraseñadocente', '$correodocente', 'activo')";

   $resultado = $conexion->prepare($insertar);
   $resultado->execute();

    
    if($resultado){
        echo '<script>alert("Docente Registrado");parent.location = "menu-adm.php"</script>'; 

  }else{
    echo '<script>alert("Error al registrar");parent.location = "menu-adm.php"</script>'; 
  }
 }
?>