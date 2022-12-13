<?php
require('fpdf.php');

class PDF extends FPDF
{
	// Cabecera de página
	function Header()
	{
		// Logo
		$this->Image('imagenes/logoayacucho.jpg', 240, 2, 35, 38);
		// Arial bold 15
		$this->SetFont('Arial', 'B', 15);
		// Movernos a la derecha
		$this->Cell(80);
		// Título
		// $this->Cell(30, 10, 'PRESUPUESTOS POR CARRERAS', 0, 0, 'C');
		// Salto de línea
		$this->Ln(10);
	}

	// Pie de página
	function Footer()
	{
		// Posición: a 1,5 cm del final
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial', 'I', 8);
		// Número de página
		$this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
	}
	
}

// Creación del objeto de la clase heredada
// $pdf = new PDF('L', 'mm', 'letter');
// $pdf->AliasNbPages();
// $pdf->AddPage();
// $pdf->SetFont('Times','',12);


// $pdf->Output();
