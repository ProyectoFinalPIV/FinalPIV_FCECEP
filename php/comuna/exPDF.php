<?php
require('../../recursos/reporte/fpdf.php');
include('comuna_modelo.php');
$Alquiler = new Alquiler();

class PDF extends FPDF
{
function Header()
{
    // Logo
    $this->Image('../../recursos/img/logo.jpg',10,10,33, 20,'JPG');
    // Arial bold 15
    $this->SetFont('Arial','B',32);
	$this->SetTextColor(0,50,255);
    // Movernos a la derecha
    $this->Cell(33,20,'',1);
    // Título
    $this->Cell(107,15,'LivingSoft',0,0,'C');

    $this->AliasNbPages();
    $this->SetFont('Arial','B',16);
    $this->SetTextColor(0,50,255);
    $this->Cell(0,15,'Page '.$this->PageNo().'/{nb}',0,0,'L');
    // Salto de línea
    $this->Ln(20);
	$this->SetFont('Arial','',14);
}

// Cargar los datos
function cargarDatos($file)
{
    // Leer las l�neas del fichero
    $archivo = file($file);
    $datos = array();
    foreach($archivo as $linea)
        $datos[] = explode(';',trim($linea));
    return $datos;
}

function construirTabla($titulos, $datos)
{
    // Colores, ancho de l�nea y fuente en negrita
    $this->SetFillColor(0,50,255);
    $this->SetTextColor(255);
    $this->SetDrawColor(255,255,255);
    $this->SetLineWidth(.2);
    $this->SetFont('','B',14);
    // Cabecera de titulos
    $w = array(30,40,40,40,42,50,35,40);
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
        $this->Cell($w[0],6,$row['alquiler_consecutivo'],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row['zona_descripcion'],'LR',0,'L',$fill);
        $this->Cell($w[2],6,$row['alquiler_valor'],'LR',0,'R',$fill);
        $this->Cell($w[6],6,$row['apartamento_nombre'],'LR',0,'R',$fill);
        $this->Cell($w[7],6,$row['fecha'],'LR',0,'R',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // Línea de cierre
    $this->Cell(0,0,'','T');
}
}


$pdf = new PDF();
// T�tulos de las columnas
$titulos = array('Consecutivo', 'Zona(s)', 'Valor', 'Apartamento', 'Fecha');
// Carga de datos
$datos = $Persona->lista();
$pdf->SetFont('Arial','',10);
$pdf->AddPage('L');
$pdf->construirTabla($titulos,$datos);
$pdf->Output('D','Alquiler.pdf', 'isUTF8');
?>
