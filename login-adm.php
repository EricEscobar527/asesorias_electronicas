<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrador</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <span>Asesorias Electrónicas</span>  
        <img class="tesci" src="logo/logo.png" alt="">
    </header>
   <div class="administrador">
    <h1>Ingresar</h1> 
    <form action="validar_login_adm.php" method="POST">
        <input type="text" name="usuario" placeholder="Ingresa tu nombre" required>
        <input type="password" name="contraseña" placeholder="Ingresa tu contraseña" required>
        <input type="submit" value="Ingresar">
        <br>
        <a href="registrar_adm.php" style="text-decoration:none; color:white; font-weight: bold;font-size: 20px;">Registrar cuenta</a>
    </form>
    </div>

    <footer>
       <div class="footer_container">
           <h5>© Tecnológico de Estudios Superiores de Cuautitlán Izcalli</h5>
       </div>
    </footer>
</body>
</html>