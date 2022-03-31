<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Grafica</title>
        <link rel="stylesheet" href="graficas.css">

		<style type="text/css">
#container {
    height: 400px;
}

.highcharts-figure,
.highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}
.btn{
    position: relative;
    left:30px;
    top:15px;
}

		</style>
	</head>
	<body>
<header>
<img class="tesci" src="logo/logo.png" alt="">
</header>

<script src="code/highcharts.js"></script>
<script src="code/modules/export-data.js"></script>
<script src="code/modules/accessibility.js"></script>

<input type="button" class="btn" name="imprimir" value="Imprimir" onclick="window.print();"> 

<figure class="highcharts-figure">
    <div id="container"></div>
</figure>
<?php
include('conexion.php');
$docente_matricula = $_POST['docente_matricula'];

$objeto = new Conexion;
$conexion = $objeto->Conectar();

$eneroH = "SELECT count(genero) as eneroh FROM asesoria WHERE genero = 'M' AND fecha BETWEEN '2022-01-01' AND '2022-01-31' AND docente_matricula = '$docente_matricula'";
$febreroH = "SELECT count(genero) as febreroh FROM asesoria WHERE genero = 'M' AND fecha BETWEEN '2022-02-01' AND '2022-02-31' AND docente_matricula = '$docente_matricula'";
$marzoH = "SELECT count(genero) as marzoh FROM asesoria WHERE genero = 'M' AND fecha BETWEEN '2022-03-01' AND '2022-03-31' AND docente_matricula = '$docente_matricula'";
$abrilH = "SELECT count(genero) as abrilh FROM asesoria WHERE genero = 'M' AND fecha BETWEEN '2022-04-01' AND '2022-05-31' AND docente_matricula = '$docente_matricula'";
$mayoH = "SELECT count(genero) as mayoh FROM asesoria WHERE genero = 'M' AND fecha BETWEEN '2022-05-01' AND '2022-05-31' AND docente_matricula = '$docente_matricula'";
$junioH = "SELECT count(genero) as junioh FROM asesoria WHERE genero = 'M' AND fecha BETWEEN '2022-06-01' AND '2022-06-31' AND docente_matricula = '$docente_matricula'";
$julioH = "SELECT count(genero) as julioh FROM asesoria WHERE genero = 'M' AND fecha BETWEEN '2022-07-01' AND '2022-07-31' AND docente_matricula = '$docente_matricula'";
$agostoH = "SELECT count(genero) as agostoh FROM asesoria WHERE genero = 'M' AND fecha BETWEEN '2022-08-01' AND '2022-08-31' AND docente_matricula = '$docente_matricula'";
$septiembreH = "SELECT count(genero) as septiembreh FROM asesoria WHERE genero = 'M' AND fecha BETWEEN '2022-09-01' AND '2022-09-31' AND docente_matricula = '$docente_matricula'";
$octubreH = "SELECT count(genero) as octubreh FROM asesoria WHERE genero = 'M' AND fecha BETWEEN '2022-10-01' AND '2022-10-31' AND docente_matricula = '$docente_matricula'";
$noviembreH = "SELECT count(genero) as noviembreh FROM asesoria WHERE genero = 'M' AND fecha BETWEEN '2022-11-01' AND '2022-11-31' AND docente_matricula = '$docente_matricula'";
$diciembreH = "SELECT count(genero) as diciembreh FROM asesoria WHERE genero = 'M' AND fecha BETWEEN '2022-12-01' AND '2022-12-31' AND docente_matricula = '$docente_matricula'";

$resultado = $conexion->prepare($eneroH);
$resultado->execute();

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
         $eneroH = $row['eneroh'];
 }
 $resultado = $conexion->prepare($febreroH);
 $resultado->execute();

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
         $febreroH = $row['febreroh'];
 }
 $resultado = $conexion->prepare($marzoH);
 $resultado->execute();

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
         $marzoH = $row['marzoh'];
 }
 $resultado = $conexion->prepare($abrilH);
 $resultado->execute();

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
         $abrilH = $row['abrilh'];
 }

 $resultado = $conexion->prepare($mayoH);
 $resultado->execute();

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
         $mayoH = $row['mayoh'];
 }
 $resultado = $conexion->prepare($junioH);
 $resultado->execute();

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
         $junioH = $row['junioh'];
 }
 $resultado = $conexion->prepare($julioH);
 $resultado->execute();

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
         $julioH = $row['julioh'];
 }
 $resultado = $conexion->prepare($agostoH);
 $resultado->execute();

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
         $agostoH = $row['agostoh'];
 }
 $resultado = $conexion->prepare($septiembreH);
 $resultado->execute();

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
         $septiembreH = $row['septiembreh'];
 }
 $resultado = $conexion->prepare($octubreH);
 $resultado->execute();

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
         $octubreH = $row['octubreh'];
 }
 $resultado = $conexion->prepare($noviembreH);
 $resultado->execute();

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
         $noviembreH = $row['noviembreh'];
 }
 $resultado = $conexion->prepare($diciembreH);
 $resultado->execute();

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
         $diciembreH = $row['diciembreh'];
 }

?>

<?php
$docente_matricula = $_POST['docente_matricula'];

$objeto = new Conexion;
$conexion = $objeto->Conectar();

$eneroF = "SELECT count(genero) as enerof FROM asesoria WHERE genero = 'F' AND fecha BETWEEN '2022-01-01' AND '2022-01-31' AND docente_matricula = '$docente_matricula'";
$febreroF = "SELECT count(genero) as febrerof FROM asesoria WHERE genero = 'F' AND fecha BETWEEN '2022-02-01' AND '2022-02-31' AND docente_matricula = '$docente_matricula'";
$marzoF = "SELECT count(genero) as marzof FROM asesoria WHERE genero = 'F' AND fecha BETWEEN '2022-03-01' AND '2022-03-31' AND docente_matricula = '$docente_matricula'";
$abrilF = "SELECT count(genero) as abrilf FROM asesoria WHERE genero = 'F' AND fecha BETWEEN '2022-04-01' AND '2022-05-31' AND docente_matricula = '$docente_matricula'";
$mayoF = "SELECT count(genero) as mayof FROM asesoria WHERE genero = 'F' AND fecha BETWEEN '2022-05-01' AND '2022-05-31' AND docente_matricula = '$docente_matricula'";
$junioF = "SELECT count(genero) as juniof FROM asesoria WHERE genero = 'F' AND fecha BETWEEN '2022-06-01' AND '2022-06-31' AND docente_matricula = '$docente_matricula'";
$julioF = "SELECT count(genero) as juliof FROM asesoria WHERE genero = 'F' AND fecha BETWEEN '2022-07-01' AND '2022-07-31' AND docente_matricula = '$docente_matricula'";
$agostoF = "SELECT count(genero) as agostof FROM asesoria WHERE genero = 'F' AND fecha BETWEEN '2022-08-01' AND '2022-08-31' AND docente_matricula = '$docente_matricula'";
$septiembreF = "SELECT count(genero) as septiembref FROM asesoria WHERE genero = 'F' AND fecha BETWEEN '2022-09-01' AND '2022-09-31' AND docente_matricula = '$docente_matricula'";
$octubreF = "SELECT count(genero) as octubref FROM asesoria WHERE genero = 'F' AND fecha BETWEEN '2022-10-01' AND '2022-10-31' AND docente_matricula = '$docente_matricula'";
$noviembreF = "SELECT count(genero) as noviembref FROM asesoria WHERE genero = 'F' AND fecha BETWEEN '2022-11-01' AND '2022-11-31' AND docente_matricula = '$docente_matricula'";
$diciembreF = "SELECT count(genero) as diciembref FROM asesoria WHERE genero = 'F' AND fecha BETWEEN '2022-12-01' AND '2022-12-31' AND docente_matricula = '$docente_matricula'";


$resultado = $conexion->prepare($eneroF);
$resultado->execute();

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
         $eneroF = $row['enerof'];
 }
 $resultado = $conexion->prepare($febreroF);
 $resultado->execute();

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
         $febreroF = $row['febrerof'];
 }
 $resultado = $conexion->prepare($marzoF);
 $resultado->execute();

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
         $marzoF = $row['marzof'];
 }
 $resultado = $conexion->prepare($abrilF);
 $resultado->execute();

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
         $abrilF = $row['abrilf'];
 }

 $resultado = $conexion->prepare($mayoF);
 $resultado->execute();

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
         $mayoF = $row['mayof'];
 }
 $resultado = $conexion->prepare($junioF);
 $resultado->execute();

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
         $junioF = $row['juniof'];
 }
 $resultado = $conexion->prepare($julioF);
 $resultado->execute();

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
         $julioF = $row['juliof'];
 }
 $resultado = $conexion->prepare($agostoF);
 $resultado->execute();

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
         $agostoF = $row['agostof'];
 }
 $resultado = $conexion->prepare($septiembreF);
 $resultado->execute();

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
         $septiembreF = $row['septiembref'];
 }
 $resultado = $conexion->prepare($octubreF);
 $resultado->execute();

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
         $octubreF = $row['octubref'];
 }
 $resultado = $conexion->prepare($noviembreF);
 $resultado->execute();

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
         $noviembreF = $row['noviembref'];
 }
 $resultado = $conexion->prepare($diciembreF);
 $resultado->execute();

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
         $diciembreF = $row['diciembref'];
 }
?>
<?php
$docente_matricula = $_POST['docente_matricula'];
$objeto = new Conexion;
$conexion = $objeto->Conectar();
$nombre_docente = "SELECT CONCAT (nombre, ' ',  apellido_paterno, ' ', apellido_materno) as nombre_completo From docentes WHERE matricula = '$docente_matricula'";
$resultado = $conexion->prepare($nombre_docente);
$resultado->execute();
while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
    $nombre = $row['nombre_completo'];
}

?>

		<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Asesorias electrónicas, docente: <?php echo $nombre?>'
    },
    xAxis: {
        categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
    },
    yAxis: {
        min: 0,
        title: {
            text: 'No. de asesorias'
        },
        stackLabels: {
            enabled: true,
            style: {
                fontWeight: 'bold',
                color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || 'gray'
            }
        }
    },
    legend: {
        align: 'right',
        x: -30,
        verticalAlign: 'top',
        y: 25,
        floating: true,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || 'white',
        borderColor: '#CCC',
        borderWidth: 1,
        shadow: false
    },
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true
            }
        }
    },
    series: [{
        name: 'Hombres',
        data: [<?php echo $eneroH ?>, <?php echo $febreroH ?>, <?php echo $marzoH ?>, <?php echo $abrilH ?>, <?php echo $mayoH ?>, <?php echo $junioH ?>, <?php echo $julioH ?>, <?php echo $agostoH ?>, <?php echo $septiembreH ?>, <?php echo $octubreH ?>, <?php echo $noviembreH ?>, <?php echo $diciembreH ?>]
    }, {
        name: 'Mujeres',
        data: [<?php echo $eneroF ?>, <?php echo $febreroF ?>, <?php echo $marzoF ?>, <?php echo $abrilF ?>, <?php echo $mayoF ?>, <?php echo $junioF ?>, <?php echo $julioF ?>, <?php echo $agostoF ?>, <?php echo $septiembreF ?>, <?php echo $octubreF ?>, <?php echo $noviembreF ?>, <?php echo $diciembreF ?>]
    }]
});
		</script>
        <footer>
       <div class="footer_container">
           <h5>© Tecnológico de Estudios Superiores de Cuautitlán Izcalli</h5>
       </div>
    </footer>
	</body>

</html>
