<?php
// require_once("../clases/autoload.php");
// require_once("../clases/claseInsumo.php");
// require_once("../clases/Konectar.php");
// require_once("../clases/claseSolicitud.php");
include 'prueba.php';
require 'atar.php';

$id = $_GET['id'];




$sql = "SELECT P.npartida,P.descripcion,P.monto as presupuesto_vigente,I.precio as precio,I.descripcion as desinsumo
FROM tbl_peconomica as P,tbl_insumo as I
where P.npartida=I.npartida and I.id_insumo=$id";
$resultado = $mysqli->query($sql);


$pdf = new PDF('L', 'mm', 'letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);


$pdf->Image('imagenes/logoayacucho.jpg', 240, 2, 35, 38, 'JPG');


$pdf->MultiCell(150, 5,utf8_decode('GOBIERNO AUTOMO DEPARTAMENTAL DE LA PAZ
DIRECCION DEPARTAMENTAL DE EDUCACION LA PAZ
UNIDAD DE ADMINISTRACION DE RECURSOS '), 0, 'L', 0 );
$pdf->Ln(10);
$pdf->Cell(70, 20);
$pdf->MultiCell(80,8, ( "CERTIFICACION PRESUPUESTARIA"),'B', 'C', 0);
$pdf->Ln(8);


// while ($wow = $resultado->fetch_assoc()) {
//     $pdf->Cell(50, 10, utf8_decode($wow['npartida']), 0, 0, 'C');
//     $pdf->Cell(60, 10, utf8_decode($wow['descripcion']), 0, 1, 'C');
// }

$pdf->SetFillColor(175, 0, 0);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(128, 0, 0);
$pdf->SetFont('helvetica', 'B', '10');
$pdf->MultiCell(250, 5,utf8_decode('Presupuesto vigente aprobado, del Instituto Tecnológico "Ayacucho". 
Debido a que todo el proceso e adquisicion se inicia con la certificación presupuestaria del saldo en la 
partida correspondiente; 
El responsable de Bienes y servicios debe ajustarse a los términos de la presente Certificación '),0, 'L', 0 );
$pdf->Ln(5);


$pdf->Cell(20, 10,utf8_decode('N°partida'), 1, 0, 'C');
$pdf->Cell(60, 10, 'Descripcion', 1, 0, 'C');
$pdf->Cell(50, 10, 'Presupuesto vigente', 1, 0, 'C');
$pdf->Cell(40, 10, 'Precio', 1, 0, 'C');
$pdf->Cell(90, 10, 'Descripcion Insumo', 1, 1, 'C');

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(20, 10, utf8_decode($row['npartida']), 1, 0, 'C');
    $pdf->Cell(60, 10, utf8_decode($row['descripcion']), 1, 0, 'C');
    $pdf->Cell(50, 10, utf8_decode(number_format($row['presupuesto_vigente'], 2, ',', '.')), 1, 0, 'C');
    $pdf->Cell(40, 10, utf8_decode(number_format($row['precio'], 2, ',', '.')), 1, 0, 'C');
    $pdf->Cell(90, 10, utf8_decode($row['desinsumo']), 1, 1, 'C');
   
}



$pdf->Output();