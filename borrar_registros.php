<?php
include ("conexion.php");

if (isset($_POST['borrar'])) {

    $objeto = new Conexion;
    $conexion = $objeto->Conectar();
    
    $eliminar = "DELETE FROM asesoria";
    
    $resultado_eliminar = $conexion->prepare($eliminar);
    $resultado_eliminar->execute();

if($resultado_eliminar){
    echo '<script>alert("Registros borrados");parent.location = "menu-adm.php"</script>'; 
}else{
    echo '<script>alert("Error al borrar registros");parent.location = "menu-adm.php"</script>';
}
}
?>