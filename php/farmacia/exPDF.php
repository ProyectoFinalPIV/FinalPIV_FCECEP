<?php
require('../../recursos/reporte/fpdf.php');
require_once("../../php/modeloAbstractoDB.php");
include('./farmacia_modelo.php');
$Farmacia = new Farmacia();

class PDF extends FPDF
{
function Header()
{
    // Logo
    $this->Image('../../recursos/img/logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    $this->SetTextColor(255,0,0);
    // Movernos a la derecha
    $this->Cell(40);
    // T�tulo
    $this->Cell(100,5,'Centro Colombiano De Estudios Profesionales',0,0,'L');
    // Salto de l�nea
    $this->Ln(20);
    $this->SetFont('Arial','',14);
}

// Cargar los datos
function cargarDatos()
{
    // Leer las l�neas del fichero
    /*$archivo = file($file);
    $datos = array();
    foreach($archivo as $linea)
        $datos[] = explode(';',trim($linea));
    return $datos;*/
  $farmacia = new farmacia();
   $datos = $farmacia->lista();
   return $datos;

}



// Tabla simple
function TablaBasica($titulos, $datos)
{
    $this->SetFont('','',10);
    $this->SetTextColor(0,0,0);
    // Cabecera de titulos
    foreach($titulos as $col)
        $this->Cell(35,7,$col,1);
    $this->Ln();
    
    // Datos
    foreach($datos as $row)
    {
        foreach($row as $col)
            $this->Cell(35,6,$col,1);
        $this->Ln();
    }
}

// Una tabla mejorada
/*function TablaMejorada($titulos, $datos)
{
    // Ancho de las columnas
    $w = array(25,80, 60, 25);
    $this->SetFont('','B',14);
    // Cabeceras de titulos
    for($i=0;$i<count($titulos);$i++)
        $this->Cell($w[$i],7,$titulos[$i],1,0,'C');
    $this->Ln();
     $this->SetFont('','',10);
    // Datos
    foreach($datos as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
        $this->Ln();
    }
    // L�nea de cierre
    $this->Cell(array_sum($w),0,'','T');
}*/

// Tabla Elegante
/*function TablaElegante($titulos, $datos)
{
    // Colores, ancho de l�nea y fuente en negrita
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.2);
    $this->SetFont('','B',14);
    // Cabecera de titulos
    $w = array(25,80, 60, 25);
    for($i=0;$i<count($titulos);$i++)
        $this->Cell($w[$i],7,$titulos[$i],1,0,'C',true);
    $this->Ln();
    // Restauraci�n de colores y fuentes
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('','',10);
    // Datos
    $fill = false;
    foreach($datos as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // L�nea de cierre
    $this->Cell(array_sum($w),0,'','T');
}*/
}


$pdf = new PDF();
// T�tulos de las columnas
$titulos = array('Codigo', 'Nombre', 'Direccion', 'Ciudad', 'Telefono');
// Carga de datos
$datos = $pdf->cargarDatos();
$pdf->SetFont('Arial','',10);
$pdf->AddPage();
$pdf->TablaBasica($titulos,$datos);

#$pdf->TablaMejorada($titulos,$datos);

#$pdf->TablaElegante($titulos,$datos);
$pdf->Output();
?>