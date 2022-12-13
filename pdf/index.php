<?php
include 'plantilla1.php';
require 'atar.php';
require "prueba.php";


$sql = "SELECT* FROM tbl_carrera";
$sqll = "SELECT sum(presupuesto) as suma FROM tbl_carrera";
$resultado = $mysqli->query($sql);
$resultadoo= $mysqli->query($sqll);


$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','',15);
$pdf->Cell(30,20);



$pdf->Line(180, 23, 10, 23);
$pdf->Image('imagenes/logoayacucho.jpg' , 165 ,2, 35 , 38,'JPG');
$pdf->Cell(50, 22, "PRESUPUESTOS POR CARRERAS",);
$pdf->Ln(30);

$pdf->SetFillColor(175, 0, 0);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(128, 0, 0);
$pdf->SetFont('Arial', 'B', '15');
$pdf->Cell(63, 10, 'Id carrera', 1, 0, 'C');
$pdf->Cell(62, 10, 'Nombre', 1, 0, 'C');
$pdf->Cell(63, 10, 'Presupuesto', 1, 1, 'C');



while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(63, 10, utf8_decode($row['id_carrera']), 1, 0, 'C');
    $pdf->Cell(62, 10,utf8_decode($row['nombre']) , 1, 0, 'C');
    $pdf->Cell(63, 10, utf8_decode($row['presupuesto']), 1, 1, 'C',);
}
while($row=$resultadoo->fetch_assoc()){
    $pdf->Cell(63, 10, "", 1, 0, 'C');
    $pdf->Cell(62, 10," TOTAL.-" , 1, 0, 'C',1);
    $pdf->Cell(63, 10, utf8_decode($row['suma']), 1, 1, 'C',1);
}
$pdf->Output();
?>
