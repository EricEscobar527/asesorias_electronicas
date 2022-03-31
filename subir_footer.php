<?php
    //Si se quiere subir una imagen
    if (isset($_POST['subir_footer'])) {
        unlink("./Imagenes/footer.jpg");
        //Recogemos el archivo enviado por el formulario
        $archivo = $_FILES['footer']['name'];
        //Si el archivo contiene algo y es diferente de vacio
        if (isset($archivo) && $archivo != "") {
           //Obtenemos algunos datos necesarios sobre el archivo
           $tipo = $_FILES['footer']['type'];
           $tamano = $_FILES['footer']['size'];
           $temp = $_FILES['footer']['tmp_name'];
           //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
          if (!((strpos($tipo, "jpeg") || strpos($tipo, "jpg")) && ($tamano < 5000000))) {
            echo '<script> alert("Solo se permiten archivos .jpg, .jpeg y de 500 kb como máximo");parent.location = "menu-adm.php"</script>';
          }
          else { 
             //Si la imagen es correcta en tamaño y tipo
             //Se intenta subir al servidor
            $archivo = preg_replace("/png|jpg|jpeg/", "jpg", $archivo);
             if (move_uploaded_file($temp, 'Imagenes/'.$archivo)) {
                 //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                 chmod('Imagenes/'.$archivo, 0777);
                 rename("./Imagenes/$archivo","./Imagenes/footer.jpg");
                 //Mostramos el mensaje de que se ha subido con éxito
                 echo '<script> alert("Se ha subido correctamente la imagen");parent.location = "menu-adm.php"</script>';
             }
             else {
                //Si no se ha podido subir la imagen, mostramos un mensaje de error
                echo '<script> alert("No se pudo guardar la imagen");parent.location = "menu-adm.php"</script>';
             }
           }
        }
     }
    ?>