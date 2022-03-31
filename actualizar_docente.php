<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario'];
if($varsesion == NULL || $varsesion = ''){
    header("location:login-adm.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="menus.css">
</head>
<body>
<header>
    <img class="tesci" src="logo/logo.png" alt="">
    </header>

<?php
include('conexion.php');
$matricula = $_GET["matricula"];
$docentes = "SELECT * FROM docentes WHERE matricula = '$matricula'";
?>

<form id="tabla" class="tabla_actualizar" action="procesar.php" method="POST">
       
        <table>
        <caption>Docentes</caption>
        <tr>
            <th>Nombre(s)</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Contraseña</th>
            <th>No. Empleado</th>
            <th>Correo</th>
            <th>Estatus</th>
            <th>Actualizar</th>
        </tr>
        <?php
        $objeto = new Conexion;
        $conexion = $objeto->Conectar();
        $resultadoDocentes = $conexion->prepare($docentes);
        $resultadoDocentes->execute();
        while($row = $resultadoDocentes->fetch(PDO::FETCH_ASSOC)){ ?>
        <tr>
            <td><input type="text" class="tabla_input1" value="<?php echo $row['nombre'];?>" name="nombre" id="nombre"></td>
            <td><input type="text" class="tabla_input2" value="<?php echo $row['apellido_paterno'];?>" name="apellido1" id="apellido1"></td>
            <td><input type="text" class="tabla_input3" value="<?php echo $row['apellido_materno'];?>" name="apellido2" id="apellido2"></td>
            <td><input type="text" class="tabla_input4" value="<?php echo $row['contraseña'];?>" name="contraseña" id="contraseña"></td>
            <td><input type="text" class="tabla_input5" value="<?php echo $row['matricula'];?>" name="matricula" id="matricula"></td>
            <td><input type="text" class="tabla_input6" value="<?php echo $row['correo'];?>" name="correo" id="correo"></td>
            <td><select name="estatus" id="estatus" class="tabla_input7">
            <option disabled selected value>Seleccionar</option>
            <option value="activo">activo</option>
            <option value="inactivo">inactivo</option>
        </select></td>
            <td><input type="submit" name="submit" id="submit" value="Actualizar" class="tabla_input8"></td>
        <?php } ?>
        </tr>
    </table>
</form>

<script src="validar_tabla.js"></script>
</body>
</html>