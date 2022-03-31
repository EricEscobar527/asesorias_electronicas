<?php
$conn = new mysqli('localhost', 'root', '' , 'asesorias_electronicas');

$archivo = $_POST['archivo_sql'];

if(empty($archivo)){
    echo '<script>alert("Debes seleccionar un archivo .SQL");parent.location = "menu-adm.php"</script>';
    exit;
}
$arrayString = explode(".", $archivo); //array(archivo, sql)
$extension = end($arrayString); //sql

if($extension != "sql"){
    echo '<script>alert("Solo se permiten archivos con extension .sql");parent.location = "menu-adm.php"</script>';
    exit;
}else{

$query = '';
$sqlScript = file('./backups/'.$archivo);
foreach ($sqlScript as $line)   {
        
        $startWith = substr(trim($line), 0 ,2);
        $endWith = substr(trim($line), -1 ,1);
        
        if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
                continue;
        }
                
        $query = $query . $line;
        if ($endWith == ';') {
                mysqli_query($conn,$query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
                $query= '';             
        }
}
echo '<script>alert("Base de datos restablecida");parent.location = "menu-adm.php"</script>'; 
}
?>