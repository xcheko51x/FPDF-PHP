<?php

require 'FPDF/fpdf.php';

/*// Datos de conexión
$mysqli = new mysqli("localhost", "root", "", "pruebas");

if(mysqli_connect_errno()) {
	echo 'Conexion fallida: ', mysqli_connect_errno();
	exit();
}

// Consulta
$query = "SELECT * FROM usuarios";
$resultado = $mysqli->query($query);*/

$estudiante1 = [
	"nombre" => "Juan Perez Perez",
	"grado" => 5,
	"espanol" => 10,
	"matematicas" => 7,
	"historia" => 9,
	"ciencias naturales" => 8,
	"geografia" => 8
];

$estudiante2 = [
	"nombre" => "Ana Lopez Lopez",
	"grado" => 6,
	"espanol" => 9,
	"matematicas" => 8,
	"historia" => 8,
	"ciencias naturales" => 10,
	"geografia" => 8
];

$estudiante3 = [
	"nombre" => "Laura Ramirez Ramirez",
	"grado" => 3,
	"espanol" => 8,
	"matematicas" => 8,
	"historia" => 8,
	"ciencias naturales" => 8,
	"geografia" => 8
];

$estudiantes = array($estudiante1, $estudiante2, $estudiante3);

$pdf = new fpdf();

for($i = 0 ; $i < sizeof($estudiantes) ; $i++) {
	$pdf->AddPage();

	$pdf->SetFont('Arial','B',16);
	$pdf->Text(20, 30, "Alumno: ".$estudiantes[$i]["nombre"]);

	$pdf->SetFont('Arial', '',16);
	$pdf->Text(20, 40, "Grado: ".$estudiantes[$i]["grado"]);

	$pdf->SetXY(10, 60);

	$pdf->setFillColor(232, 232, 232);
	$pdf->setFont('Arial', 'B', 12);
	$pdf->Cell(0, 10, 'MATERIAS', 1, 0, 'C', true);

	$pdf->SetXY(10, 70);
	$pdf->setFont('Arial', 'B', 12);
	$pdf->Cell(30, 10, 'ESPANOL', 1, 0, 'C', true);
	$pdf->Cell(40, 10, 'MATEMATICAS', 1, 0, 'C', true);
	$pdf->Cell(30, 10, 'HISTORIA', 1, 0, 'C', true);
	$pdf->Cell(55, 10, 'CIENCIAS NATURALES', 1, 0, 'C', true);
	$pdf->Cell(35, 10, 'GEOGRAFIA', 1, 0, 'C', true);

	$pdf->SetXY(10, 80);
	$pdf->setFont('Arial', '', 12);
	$pdf->Cell(30, 10, $estudiantes[$i]["espanol"], 1, 0, 'C', false);
	$pdf->Cell(40, 10, $estudiantes[$i]["matematicas"], 1, 0, 'C', false);
	$pdf->Cell(30, 10, $estudiantes[$i]["historia"], 1, 0, 'C', false);
	$pdf->Cell(55, 10, $estudiantes[$i]["ciencias naturales"], 1, 0, 'C', false);
	$pdf->Cell(35, 10, $estudiantes[$i]["geografia"], 1, 0, 'C', false);
	

}

$pdf->Output();

?>