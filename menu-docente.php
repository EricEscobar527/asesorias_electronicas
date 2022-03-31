<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['matricula'];
if($varsesion == NULL || $varsesion = ''){
    header("location:login-docente.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docentes</title>
    <link rel="stylesheet" href="menus.css">
    <script src="librerias/jquery-3.6.0.min.js"></script>
    <script src="tab_docente.js"></script>
</head>
<body>
<header>
        <ul class="cont-ul">
            <li class="develop">Docentes
           <ul class="ul-second">
               
                <li class="six"><a href="#tab1">Registrar asesoria</a></li>
                   
                <li class="seven"><a href="#tab2">Ver reportes</a></li> 
               
                <li class="eight"><a href="#tab3">Cambiar contraseña</a></li>
               
                <li class="nine"><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
        </ul>
    </li>
</ul>
<img class="tesci" src="logo/logo.png" alt="">
</header>
<?php 
     include('conexion.php');
     $docente_matricula = $_SESSION['matricula'];
     $objeto = new Conexion;
     $conexion = $objeto->Conectar();
     
     $nombre_docente = "SELECT CONCAT (nombre, ' ',  apellido_paterno, ' ', apellido_materno) as nombre_completo From docentes WHERE matricula = '$docente_matricula'"; 
     
     $resultado = $conexion->prepare($nombre_docente);
     $resultado->execute();
     while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
         
        echo "<p style=z-index:900;right:0;top:56px;position:absolute;width:310px;padding:5px;background-color:#363636;color:white;>Bienvenido docente: " . $row['nombre_completo'];"</p>";
     }
    
    ?>

<div class="formularios">

<form id="tab1" class="form-reg-asesoria" method="POST" action="guardar_asesoria.php?docente_matricula=<?php echo $_SESSION['matricula'];?>">
<br>
<div>
    <label for="">Fecha</label>
    <input type="date" name="fecha_asesoria" id="fecha_asesoria">
</div>
<br>
<div>
    <label for="">Tipo de asesoria</label>
    <select id="tipo" name="tipo">
    <option disabled selected value>--Seleccionar--</option>
    <option value="Academica">Academica</option>
    <option value="Residencia profesional">Residencia profesional</option>
    <option value="Titulacion">Titulación</option>
    <option value="Proyecto">Proyecto</option>
    
</select>
</div>
 <br>
<div>
    <label for="">Selecciona una opción</label>
    <select id="para" name="para">
    <option disabled selected value>--Seleccionar--</option>
    <option value="Asignatura">Asignatura</option>
    <option value="Opcion de titulación">Opción de titulación</option>
    <option value="Proyecto">Proyecto</option>     
    </select>
            </div>
            <br>
            <div>
                <label for="">Tema</label>
                <br>
                <textarea name="tema" id="tema" placeholder="Tema(s) tratados durante la asesoria" id="" cols="50" rows="3" value="<?php if(isset($tema)) echo $tema ?>"></textarea>
            </div>
            <br>
            <div>
                <label for="">Hora Inicio</label>
                <input type="time" name="hora_inicio" id="hora_inicio">
            
                <label for="">Hora Termino</label>
                <input type="time" name="hora_termino" id="hora_termino">
            </div>
        <br>
            <div class="label_alumno">
                <label for="">Nombre del alumno</label>
                <input class="input_alumno" type="text" id="nombre_alumno" name="nombre_alumno" value="<?php if(isset($nombre)) echo $nombre ?>">
            </div>
            <br>
            <div>
                <label for="">No. Control del alumno</label>
                <input class="input_matricula" type="number" name="matricula" id="matricula" value="<?php if(isset($matricula)) echo $matricula ?>">
            </div>
            <br>
            <div>
                <label for="">Genero</label>
                <select id="genero" name="genero">
                <option disabled selected value>--Seleccionar--</option>
                <option value="M">M</option>
                <option value="F">F</option>
               
            </select>
            </div>
            <br>
            <input type="submit" value="Registrar" id="submit" name="submit" class="consulta">
</form>


<?php
        $objeto = new Conexion;
        $conexion = $objeto->Conectar();
        
        $consulta2 = "SELECT count(matricula) AS total FROM `asesoria`";
        
        $resultado2 = $conexion->prepare($consulta2);
        $resultado2->execute();
        while($row = $resultado2->fetch(PDO::FETCH_ASSOC)){
            $total = $row['total'];
        }
        if($total == 0){
         $total = false;
        }else{
         $total = true;

        }?>
<form id="tab2" target="_blank" class="rep-periodo" action="reportes_docentes.php?docente_matricula=<?php echo $_SESSION['matricula'];?>" method="POST">
<div> 
                <label class="label" for="" >Fecha inicial</label>
                <input type="date" id="inicio_fecha" name="inicio_fecha">
            </div>
            <br>
            <div> 
                <label class="label" for="">Fecha final</label>
                <input type="date" id="final_fecha" name="final_fecha">
            </div>
            <input type="hidden" id="asesorias" name="asesorias" value="<?php echo $total;?>">
            <br>
            <input type="submit" id="submit" name="submit" class="consulta" value="Consultar" >
</form>

<?php 
$matricula_docente = $_SESSION['matricula'];
$docentes = "SELECT * FROM docentes WHERE matricula = '$matricula_docente'";
?>
 <form id="tab3" class="cambiar_pass" method="POST" action="cambiar_pass.php?matricula=<?php echo $_SESSION['matricula'];?>">
        <label for="">Contraseña</label>
        <br>
        <br>
        <?php
        $objeto = new Conexion;
        $conexion = $objeto->Conectar();
        $modificarDocentes = $conexion->prepare($docentes);
        $modificarDocentes->execute();
        while($row = $modificarDocentes->fetch(PDO::FETCH_ASSOC)) {
        $pass_docente = $row['contraseña'];
        } ?>
        <input type="text" class="pass_input" name="contraseña" id="contraseña" value="<?php echo $pass_docente;?>">  
        <br>
        <input type="submit" value="Actualizar" class="change_pass"> 
</form>

</div>

<footer>
       <div class="footer_container">
           <h5>© Tecnológico de Estudios Superiores de Cuautitlán Izcalli</h5>
       </div>
    </footer>
    
    <script src="validar_docente.js"></script>
</body>
</html>