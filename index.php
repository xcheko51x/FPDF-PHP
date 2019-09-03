<?php

// Importa la librería FPDF
require 'FPDF/fpdf.php';


// Creo datos estaticos para usarlos de ejemplo
// En esta parte se podria obtener los datos de la BD
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

// Se crea un nuevo PDF
$pdf = new fpdf();

// Ciclo para recorrer todos los datos
for($i = 0 ; $i < sizeof($estudiantes) ; $i++) {
	
        // Añade una nueva pagina
        $pdf->AddPage();

        // Se selecciona la fuente, estilo y tamaño
	$pdf->SetFont('Arial','B',16);
        // Se inserta el nombre del alumno en el pdf
        // EjeX, EjeY, texto a insertar
	$pdf->Text(20, 30, "Alumno: ".$estudiantes[$i]["nombre"]);

        // Se selecciona la fuente, estilo y tamaño
	$pdf->SetFont('Arial', '',16);
        // Se inserta el grado al pdf
        // EjeX, EjeY, texto a insertar
	$pdf->Text(20, 40, "Grado: ".$estudiantes[$i]["grado"]);

        // Nos ubica en la posicion X, Y
	$pdf->SetXY(10, 60);

        // Rellena de color puesto R,G,B
	$pdf->setFillColor(232, 232, 232);
	$pdf->setFont('Arial', 'B', 12);
        // Inserta la celda
        // Ancho, alto, texto, borde, , ubicacion, color de fondo
	$pdf->Cell(0, 10, 'MATERIAS', 1, 0, 'C', true);

	$pdf->SetXY(10, 70);
	$pdf->setFont('Arial', 'B', 12);
        // Ancho, alto, texto, borde, , ubicacion, color de fondo
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

// Cierra el PDF
$pdf->Output();

?>
