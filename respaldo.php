<?php
include('Fuction_Backup.php');

echo backup_tables('localhost','root','','asesorias_electronicas');

$fecha=date("Y-m-d");
header("Content-disposition: attachment; filename=respaldo-".$fecha.".sql");
header("Content-type: MIME");
readfile("backups/respaldo-".$fecha.".sql");
?>