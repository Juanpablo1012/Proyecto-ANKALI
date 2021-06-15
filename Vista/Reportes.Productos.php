
<?php
require('../Estilo/reportes/fpdf.php');
require '../Modelo/Conexion2.php';

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $pdf= new PDF('L','cm','Legal');
        //LOGO
        $this->Image('../Estilo/img/logo.color.png',3,1,4);
        // Arial bold 15
        $this->SetFont('Arial','B',25);
        // Movernos a la derecha
        $this->Cell(1);
        // Título
        $this->Cell(0,3,'Reporte de los productos.',0,0,'C');
        // Salto de línea
        $this->Ln(5.5);
        $this->Cell(1.1);
        $this->SetFont('Arial','B',16);

        //nombre de los titulos de la tabla
        $this->Cell(5.8,-1,'Imagen del producto', 1, 0, 'C', 0);
        $this->Cell(6.5,-1,utf8_decode('Nombre del producto'), 1, 0, 'C',0);
        $this->Cell(6,-1,'Precio del producto', 1, 0, 'C', 0);
        $this->Cell(6.5,-1,utf8_decode('Insumos del producto'), 1, 0, 'C',0);
        $this->Cell(6,-1,'Precio del insumo', 1, 1, 'C', 0);

        $this->Ln(1);

    }

    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',10);
        // Número de página
        $this->Cell(0,27,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    }
}

$consulta='SELECT producto.Imagen,producto.Nombre as nombreP, insumos.Nombre as nombreI,producto.Precio, insumos.Precio as precioI FROM dllproducto 
            JOIN producto ON (dllproducto.IdProducto=producto.IdProducto)
            JOIN insumos ON (dllproducto.IdInsumo=insumos.IdInsumo)
            WHERE producto.TipodeProducto=1';
$resultado= $con->query($consulta);

$pdf=new PDF('L','cm','Legal');
$pdf->AddPage('L','Legal'); 
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',16);

while($row = $resultado->fetch_assoc()){

    $pdf->Cell(0.1);
    //-----------------------------------------------//
    $pdf->Cell(1, 0);  $pdf->Cell(5.8,4, $pdf->Image($row['Imagen'], $pdf->GetX(), $pdf->GetY(),5.8,4),1);
    $pdf->Cell(6.5,4,utf8_decode($row['nombreP']), 1, 0, 'C',0);
    $pdf->Cell(6,4,$row['Precio'], 1, 0, 'C',0);
    $pdf->Cell(6.5,4,utf8_decode($row['nombreI']), 1, 0, 'C',0);
    $pdf->Cell(6,4,$row['precioI'], 1, 1, 'C',0);
}
$pdf->Output();
?>