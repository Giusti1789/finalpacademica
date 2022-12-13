<?php
require 'fpdf.php';

class PDF extends FPDF
{

    function Header()
    {

        $this->Ln(20);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(30, 20);
        $this->Image('imagenes/logoayacucho.jpg', 20, 10, 35, 38, 'JPG');
    }
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 9);
        $this->Cell(0, 10, 'Pagina' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}
