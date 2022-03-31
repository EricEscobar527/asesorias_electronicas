<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    
$docente_matricula = $_POST['docente_matricula'];
$objeto = new Conexion;
$conexion = $objeto->Conectar();
$nombre_docente = "SELECT CONCAT (nombre, ' ',  apellido_paterno, ' ', apellido_materno) as nombre_completo From docentes WHERE matricula = '$docente_matricula'";
$resultado = $conexion->prepare($nombre_docente);
$resultado->execute();
   
    // Logo
    $this->Image('Imagenes/header.jpg',0,0,297);
    // Salto de línea
    $this->Ln(17);
    // Arial bold 15
    $this->SetFont('Arial','',10);
    // Movernos a la derecha
    $this->Cell(100);
    // Título
    $this->Cell(80,20,utf8_decode('TECNOLOGICO DE ESTUDIOS SUPERIORES DE CUAUTITLAN IZCALLI'),0,0,'C');
    // Salto de línea
    $this->Ln(5);
    $this->Cell(100);
    $this->Cell(80,20,utf8_decode('DIRECCIÓN ACADÉMICA-JEFATURA DE DIVISIÓN DE INGENIERIA EN SISTEMAS COMPUTACIONALES'),0,0,'C');
    $this->Ln(5);
    $this->Cell(100);
    $this->Cell(80,20,utf8_decode('ASESORÍAS ACADÉMICAS'),0,0,'C');
    $this->Ln(10);
    $this->Cell(100);
    while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
    $this->Cell(-105,17,'Nombre del/la Personal Docente: '.$row['nombre_completo'],0,0,'C');
}
    $this->Ln(11);

    //Tabla
    $this->SetFont('Arial','B',9);
    $this->Cell(7, 10, 'No.', 1, 0, 'C', 0);
    $this->Cell(20, 10, 'No. Control', 1, 0, 'C', 0);
    $this->Cell(53, 10, 'Nombre del estudiante', 1, 0, 'C', 0);
    $this->Cell(17, 10, 'Fecha', 1, 0, 'C', 0);
    $this->Cell(38, 10, 'Tipo asesoria', 1, 0, 'C', 0);
    $this->Cell(65, 10, utf8_decode('Asignatura/Opcion de titulacón/Proyecto'), 1, 0, 'C', 0);
    $this->Cell(40, 10, 'Tema', 1, 0, 'C', 0);
    $this->Cell(17, 10, 'H. inicio', 1, 0, 'C', 0);
    $this->Cell(18, 10, 'H. termino', 1, 0, 'C', 0);
    $this->Cell(6, 10, 'G', 1, 1, 'C', 0);
}

// Pie de página
function Footer()
{
    $this->Image('Imagenes/footer.jpg',0,170,297);
    
}
}

include('conexion.php');

if(isset($_POST['submit'])){
    
$inicio = $_POST['inicio_fecha2'];
$final = $_POST['final_fecha2'];
$docente_matricula = $_POST['docente_matricula'];

$objeto = new Conexion;
$conexion = $objeto->Conectar();

$consulta2 = "SELECT count(matricula) AS total FROM `asesoria` WHERE fecha BETWEEN '$inicio' AND '$final' AND docente_matricula = '$docente_matricula'";

$resultado2 = $conexion->prepare($consulta2);
$resultado2->execute();

while($row = $resultado2->fetch(PDO::FETCH_ASSOC)){
    $total2 = $row['total'];
}

$objeto = new Conexion;
$conexion = $objeto->Conectar();

$consulta = "SELECT `matricula`, `nombre`, DATE_FORMAT(fecha, '%d/%m/%y') AS fecha, `tipo_asesoria`, `para`, `tema`, TIME_FORMAT(hora_inicio,'%l%:%i% %p') AS hora_inicio, TIME_FORMAT(hora_final,'%l%:%i% %p') AS hora_final, `genero` FROM `asesoria` WHERE fecha BETWEEN '$inicio' AND '$final' AND docente_matricula = '$docente_matricula'";

$resultado = $conexion->prepare($consulta);
$resultado->execute();

$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->SetAutoPageBreak(true,40); 

$i=1;

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
$pdf->Cell(7, 10, $i++, 1, 0, 'C', 0);
$pdf->Cell(20, 10, $row['matricula'], 1, 0, 'C', 0);
$pdf->Cell(53, 10, utf8_decode($row['nombre']), 1, 0, 'C', 0);
$pdf->Cell(17, 10, $row['fecha'], 1, 0, 'C', 0);
$pdf->Cell(38, 10, utf8_decode($row['tipo_asesoria']), 1, 0, 'C', 0);
$pdf->Cell(65, 10, utf8_decode($row['para']), 1, 0, 'C', 0);
$pdf->Cell(40, 10, utf8_decode($row['tema']), 1, 0, 'C', 0);
$pdf->Cell(17, 10, $row['hora_inicio'], 1, 0, 'C', 0);
$pdf->Cell(18, 10, $row['hora_final'], 1, 0, 'C', 0);
$pdf->Cell(6, 10, $row['genero'], 1, 1, 'C', 0);
}

$pdf->Cell(280, 10, 'Total: '.$total2, 2, 1, 'R', 0);


$pdf->Output();
}

?>