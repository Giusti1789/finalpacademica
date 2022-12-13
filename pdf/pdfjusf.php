<?php
require_once("../clases/autoload.php");
require_once("../clases/claseInsumo.php");
require_once("../clases/Konectar.php");
require_once("../clases/claseSolicitud.php");
include 'prueba.php';
require 'atar.php';

$id = $_GET['id'];




$sql = "SELECT* FROM tbl_solicitud where id_solicitud=$id";
$resultado = $mysqli->query($sql);


$pdf = new PDF('p', 'mm', 'letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);




$pdf->Image('imagenes/logoayacucho.jpg', 175, 2, 35, 38, 'JPG');

$pdf->MultiCell(140,5,utf8_decode('GOBIERNO AUTOMO DEPARTAMENTAL DE LA PAZ
DIRECCION DEPARTAMENTAL DE EDUCACION LA PAZ
UNIDAD DE ADMINISTRACION DE RECURSOS '), 0, 'L', 0 );
$pdf->Ln(10);
$pdf->Cell(50, 10);
$pdf->MultiCell(80,7,utf8_decode ( "JUSTIFICACIÓN DE LA SOLICITUD REQUERIDA"),0, 'C', 0);
$pdf->Ln(10);

$pdf->SetFillColor(175, 0, 0);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(128, 0, 0);
$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(140, 10, 'DESCRIPCION', 0, 0, 'C',1);
$pdf->Cell(60, 10, 'FECHA DE LA SOLICITUD', 0, 1, 'C',1);


while ($row = $resultado->fetch_assoc()) {
    // $pdf->Cell(140, 10, utf8_decode($row['descripcion']), 0, 0, 'C');
    $pdf->MultiCell(140,10,utf8_decode ( $row['descripcion']),0,1,0, 'C', 0,0);
    $pdf->SetXY(155, 80);
    $pdf->Cell(50, 10, utf8_decode($row['fecha_Registro']), 0, 0, 'C');
   
}


$pdf->Output();