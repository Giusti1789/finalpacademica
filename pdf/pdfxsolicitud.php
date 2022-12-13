<?php
require_once("../clases/autoload.php");
require_once("../clases/claseInsumo.php");
require_once("../clases/Konectar.php");
require_once("../clases/claseSolicitud.php");
include 'prueba.php';
require 'atar.php';




$id = $_GET['id'];




$sql = "SELECT* FROM tbl_insumo where id_solicitud=$id";
$sqll = "SELECT sum(precio) as suma FROM tbl_insumo where id_solicitud=$id";
$resultadoo= $mysqli->query($sqll);
$resultado = $mysqli->query($sql);


$pdf = new PDF('L', 'mm', 'letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);




$pdf->MultiCell(150, 5,utf8_decode('GOBIERNO AUTOMO DEPARTAMENTAL DE LA PAZ
DIRECCION DEPARTAMENTAL DE EDUCACION LA PAZ
UNIDAD DE ADMINISTRACION DE RECURSOS '), 0, 'L', 0 );
$pdf->Ln(10);
$pdf->Cell(70, 20);
$pdf->MultiCell(80,8, ( "CERTIFICACION PRESUPUESTARIA"),'B', 'C', 0);
$pdf->Ln(25);

$pdf->SetFillColor(158, 158, 226);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(128, 0, 0);
$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(20, 10, 'Id insumo', 1, 0, 'C');
$pdf->Cell(70, 10, 'Descripcion', 1, 0, 'C');
$pdf->Cell(30, 10, 'U. de medida', 1, 0, 'C');
$pdf->Cell(30, 10, 'Cantidad', 1, 0, 'C');
$pdf->Cell(30, 10, 'Ncheque', 1, 0, 'C');
$pdf->Cell(30, 10, 'N partida', 1, 0, 'C');
$pdf->Cell(20, 10, 'Id solicitud', 1, 0, 'C');
$pdf->Cell(30, 10, 'Precio', 1, 1, 'C');

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(20, 20, utf8_decode($row['id_insumo']), 1, 0, 'C');
    $pdf->Cell(70,20, utf8_decode($row['descripcion']),1,0,'C',0);

    
// $pdf->MultiCell(70, 20, utf8_decode($row['descripcion']), 0, 1);
// $pdf->Ln();
// $pdf->MultiCell(0, 7, utf8_decode('FPDF es una clase PHP que permite la generación de archivos PDF de forma sencilla y sin necesidad de instalar librerías adicionales, cuenta con métodos bien documentados que facilitan su uso.'), 0, 1);
// $pdf->Ln();
// $pdf->MultiCell(0, 7, utf8_decode('Antes de comenzar lo primero es descargar FPDF e incluir los archivos necesarios en nuestro proyecto.'), 0, 1);
// $pdf->Ln();
        
    $pdf->Cell(30, 20, utf8_decode($row['unMedida']),1,0,'C',0);
    $pdf->Cell(30, 20, utf8_decode(number_format($row['cantidad'], 2, ',', '.')), 1, 0, 'C');   
    $pdf->Cell(30, 20, utf8_decode($row['Ncheque']), 1, 0, 'C');
    $pdf->Cell(30, 20, utf8_decode($row['npartida']), 1, 0, 'C');
    $pdf->Cell(20, 20, utf8_decode($row['id_solicitud']), 1, 0, 'C');
    $pdf->Cell(30, 20, utf8_decode(number_format($row['precio'], 2, ',', '.')), 1, 1, 'C');
}
while ($row = $resultadoo->fetch_assoc()) {
    $pdf->Cell(20, 10, "", 0, 0, 'C');
    $pdf->Cell(70, 10, "", 0, 0, 'C');
    $pdf->Cell(30, 10, "", 0, 0, 'C');
    $pdf->Cell(30, 10, "", 0, 0, 'C');
    $pdf->Cell(30, 10, "", 0, 0, 'C');
    $pdf->Cell(30, 10, "", 0, 0, 'C');
    $pdf->Cell(20, 10, "TOTAL =", 1, 0, 'C',1);
    $pdf->Cell(30, 10, utf8_decode(number_format($row['suma'], 2, ',', '.')), 1, 0, 'C',1);
}

$pdf->Output();
