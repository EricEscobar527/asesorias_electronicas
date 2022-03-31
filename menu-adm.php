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
    <title>Administración</title>
    <link rel="stylesheet" href="menus.css">
    <script src="librerias/jquery-3.6.0.min.js"></script>
    <script src="tab_adm.js"></script>

</head>
<body>

<header>
        <ul class="cont-ul">
            <li class="develop">Administración
             <ul class="ul-second">
                <li class="back">Ver reportes
                    <ul class="ul-third2">
                            <li><a href="#tab1">En general</a></li>
                            <li><a href="#tab2">Por docente</a></li> 
                    </ul>   
                </li>
                <li class="front">Ver estadisticas
                    <ul class="ul-third">
                        <li><a href="grafica_general.php" target="_blank">En general</a></li>
                        <li class="docente"><a class="docente" href="#tab3">Por docente</a></li>
                                
                    </ul>
                </li>
                <li class="docentes">Docentes
                    <ul class="ul-fourt2">
                        <li><a href="#tab4">Agregar usuario</a></li>
                        <li><a href="#tab5">Editar | Eliminar</a></li>
                    </ul>
                </li>
                <li class="pdf">Editar PDF  
                    <ul class="ul-fourt3">
                        <li><a href="#tab6">Actualizar encabezado</a></li>
                        <li><a href="#tab7">Actualizar pie de pagina</a></li>
                    </ul>
                </li>
               <li class="administrador">Editar usuario
                <ul class="ul-fourt4">
                   <li><a href="#tab8">Editar nombre</a></li>
                   <li><a href="#tab9">Editar contraseña</a></li>
                </ul>
                </li>
                <li class="reespaldo">Mantenimiento
                    <ul class="ul_five">
                        <li><a href="#tab10">Realizar respaldo</a></li>
                        <li><a href="#tab11">Borrar registros</a></li>
                        <li><a href="#tab12">Restablecer BD</a></li>
                    </ul>
                </li>
                <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
          </ul>
        </li>
        </ul>
        <img class="tesci" src="logo/logo.png" alt="">
    </header>  

    <div class="formularios">


    <?php
    require ("conexion.php");
        $objeto = new Conexion;
        $conexion = $objeto->Conectar();
        $consulta = "SELECT count(matricula) AS total FROM `asesoria`";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $total = $row['total'];
        }
        if($total == 0){
            $total = false;
        }else{
            $total = true;}?>
    <form id="tab1" class="form-periodo-general" target="_blank" method="post" action="reporte_general.php">
    <div>
            <label for="">Fecha inicial</label>
            <input type="date" id="inicio_fecha" name="inicio_fecha">
        </div>
        <br>
        <div>
            <label for="">Fecha final</label>
            <input type="date" id="final_fecha" name="final_fecha">
        </div>
        <input type="hidden" id="asesorias" name="asesorias" value="<?php echo $total;?>">
        <br>
        <input type="submit" class="consulta" value="consultar" name="submit" id="submit">
    </form>

    <?php
        $objeto = new Conexion;
        $conexion = $objeto->Conectar();
        $consulta = "SELECT count(matricula) AS total FROM `asesoria`";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $total = $row['total'];
        }
        if($total == 0){
            $total = false;
        }else{
            $total2 = true;}?>
    <form id="tab2" class="form-periodo-docente" target="_blank" method="POST" action="reporte_docente_esp.php">
    <div>
            <label for="">Seleccionar docente</label>
            <br>
            <select name="docente_matricula" id="docente_matricula">
            <?php
            $objeto = new Conexion;
            $conexion = $objeto->Conectar();

            $select = "SELECT CONCAT (nombre, ' ',  apellido_paterno) as nombre_completo, matricula From docentes WHERE estatus = 'activo'";

            $resultado = $conexion->prepare($select);
            $resultado->execute();
            
            $row= $resultado->fetchAll(\PDO::FETCH_OBJ);
            foreach($row as $row){
                ?>
            <option value="<?php echo($row->matricula);?>"><?php echo($row->nombre_completo); ?></option>
            <?php } ?>
            </select>
        </div>
        <br>
        <div>
            <label for="">Fecha inicial</label>
            <input type="date" name="inicio_fecha2" id="inicio_fecha2">
        </div>
        <br>
        <div>
            <label for="">Fecha final</label>
            <input type="date" name="final_fecha2" id="final_fecha2">
        </div>
        <input type="hidden" id="asesorias2" name="asesorias2" value="<?php echo $total2;?>">
        <br>
        <input class="consulta" type="submit" value="consultar" name="submit" id="submit">
    </form>

    <form id="tab3" class="est-año" action="grafica_esp.php" method="POST" target="_blank">
    <div>
        <label for="">Seleccionar docente</label>
            <br>
            <select name="docente_matricula" id="docente_matricula">
            <?php
            $objeto = new Conexion;
            $conexion = $objeto->Conectar();

            $select = "SELECT CONCAT (nombre, ' ',  apellido_paterno) as nombre_completo, matricula From docentes WHERE estatus = 'activo'";

            $resultado = $conexion->prepare($select);
            $resultado->execute();
            
            $row= $resultado->fetchAll(\PDO::FETCH_OBJ);
            foreach($row as $row){
                ?>
            <option value="<?php echo($row->matricula);?>"><?php echo($row->nombre_completo); ?></option>
            <?php } ?>
            </select>
        </div>
        <br>
        <input class="consulta" type="submit" value="consultar">
    </form>

    <form id="tab4" class="reg-docentes" method="POST" action="reg_docente.php">
    <div>
            <label for="">Nombre del docente</label>
            <input class="inputnombredocente" type="text" id="nombredocente" name="nombredocente" placeholder="Nombre(s)">
            <input class="apellido1" type="text" name="apellido_paterno" id="apellido_paterno" placeholder="Apellido paterno">
            <input class="apellido2" type="text" name="apellido_materno" id="apellido_materno" placeholder="Apellido Materno">
        </div>
        <br>
         <div>
            <label for="">No. de empleado</label>
            <input class="inputmatriculadocente" type="text" name="matriculadocente" id="matriculadocente" placeholder="No. de empleado">
        </div>
        <br>
        <div>
            <label for="">Correo electrónico</label>
            <input class="inputcorreodocente" type="text" name="correodocente" id="correodocente" placeholder="Correo electrónico">
        </div>
        <br>
        <div>
            <label for="">Contraseña</label>
            <input class="inputcontraseñadocente" type="password" name="contraseñadocente" id="contraseñadocente" placeholder="Contraseña">
        </div>
        <input class="consultadocente" type="submit" value="Registrar" id="submit" name="submit">
    </form>

<?php $docentes = "SELECT * FROM docentes"; ?>
    <form id="tab5" class="tabla_docentes">
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
            <th>Modificar</th>
        </tr>
        <?php
        $objeto = new Conexion;
        $conexion = $objeto->Conectar();
        $resultadoDocentes = $conexion->prepare($docentes);
        $resultadoDocentes->execute();
        while($row = $resultadoDocentes->fetch(PDO::FETCH_ASSOC)){ ?>
        <tr>
            <td><?php echo $row['nombre'];?></td>
            <td><?php echo $row['apellido_paterno'];?></td>
            <td><?php echo $row['apellido_materno'];?></td>
            <td><?php echo $row['contraseña'];?></td>
            <td><?php echo $row['matricula'];?></td>
            <td><?php echo $row['correo'];?></td>
            <td><?php echo $row['estatus'];?></td>
            <td><a class="tabla_item_link" href="actualizar_docente.php?matricula=<?php echo $row['matricula'];?>">Editar</a> </td>
            <?php } ?>
        </tr>
    </table>
    </form>

    <form id="tab6" class="form_imagen" method="POST" action="subir_header.php" enctype="multipart/form-data">
    <label for="">Actualizar encabezado</label>
     <br>
     <br>
     <h5>*Solo se permiten archivos tipo JPG*</h5>
     <input type="file" name="header" id="header" accept="image/*">
     <br>
     <br>
     <input class="consulta" type="submit" value="Subir imagen" name="subir_header">
    </form>

    <form id="tab7" class="form_imagen" method="POST" action="subir_footer.php" enctype="multipart/form-data">
    <label class="title_img" for="">Actualizar pie de pagina</label>
     <br>
     <br>
     <h5>*Solo se permiten archivos tipo JPG*</h5>
     <input type="file" name="footer" id="footer" accept="image/*">
     <br>
     <br>
     <input class="consulta" type="submit" value="Subir imagen" name="subir_footer">
    </form>

<?php $administrador_consulta = "SELECT * FROM administrador"; ?>
    <form id="tab8" method="POST" class="cambiar_adm" action="editar_name_adm.php">
    <label for="">Usuario</label>
  <br>
  <?php
        $objeto = new Conexion;
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($administrador_consulta);
        $resultado->execute();
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $administrador_name = $row['usuario']; }?>
  <input type="text" name="usuario" id="usuario" value="<?php echo $administrador_name;?>">
  <br>
 <input type="submit" value="Actualizar" class="change_pass"> 
    </form>

<?php $administrador_pass = "SELECT * FROM administrador"; ?>
    <form id="tab9" method="POST" class="cambiar_adm" action="editar_pass_adm.php">
    <label for="">Contraseña</label>
 <br>
 <?php
        $objeto = new Conexion;
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($administrador_pass);
        $resultado->execute();
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $administrador_pass = $row['contraseña'];} ?>
  <input type="text" name="contraseña" id="contraseña" value="<?php echo $administrador_pass;?>"> 
  <br>
        <input type="submit" value="Actualizar" class="change_pass"> 
    </form>

    <form id="tab10" class="respaldo" method="POST" action="respaldo.php">
    <label for="">Se creara una copia de los registros</label>
     <br>
     <br>
     <input type="submit" value="Realizar respaldo" name="respaldo" class="change_pass">
    </form>

    <form id="tab11" method="POST" class="respaldo" action="borrar_registros.php">
    <label for="">Se borraran todas las asesorias registradas</label>
     <br>
     <br>
     <input type="submit" value="Borrar registros" name="borrar" class="borrar_registros">  
    </form>

    <form id="tab12" action="restablecer.php" method="POST" class="restablecerBD">
    <label for="">Seleccionar archivo</label>
     <br>
     <br>
     <input type="file" name="archivo_sql" id="archivo_sql">
     <input type="submit" value="Cargar archivo" class="change_pass">
    </form>

    </div>
    
    <footer>
       <div class="footer_container">
           <h5>© Tecnológico de Estudios Superiores de Cuautitlán Izcalli</h5>
       </div>
    </footer>
    <script src="validar_adm.js"></script>
</body>
</html>