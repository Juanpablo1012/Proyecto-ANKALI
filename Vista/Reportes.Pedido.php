<?php
require('../Estilo/reportes/fpdf.php');
require '../Modelo/Conexion2.php';

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $pdf=new PDF('L','cm','Legal');

    $this->Image('../Estilo/img/logo.color.png',3,1,4);
    // Arial bold 15
    $this->SetFont('Arial','B',25);
    // Movernos a la derecha
    $this->Cell(1);
    // Título
    $this->Cell(0,3,'Reporte de las ventas',0,0,'C');
    // Salto de línea
    $this->Ln(7);
    $this->Cell(1.5);
    $this->SetFont('Arial','B',16);

    $this->Cell(3,-1,utf8_decode('Código'), 1, 0, 'C',0);
    $this->Cell(6,-1,'Nombre del cliente', 1, 0, 'C', 0);
    $this->Cell(5,-1,'Documento', 1, 0, 'C', 0);
    $this->Cell(3,-1,'Cantidad',1, 0, 'C', 0);
    $this->Cell(4,-1,'Total',1, 0, 'C' ,0);
    $this->Cell(4,-1,'Fecha',1, 0, 'C', 0);
    $this->Cell(6,-1,'Nombre del producto',1, 1, 'C', 0);
    $this->Ln(3);

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

$consulta='SELECT pedido.IdPedido,usuarios.Nombre as Cliente, pedido.Documento, dllpedido.Cantidad, dllpedido.Total,pedido.Fecha,tipoproducto.Nombre, producto.Nombre FROM pedido 
JOIN usuarios on (pedido.Documento = usuarios.Documento)
JOIN dllpedido on (pedido.IdPedido = dllpedido.IdPedido)
JOIN producto on (dllpedido.IdProducto = producto.IdProducto) 
JOIN tipoproducto ON (producto.TipodeProducto = tipoproducto.IdTipoProducto)
WHERE pedido.Estado =0';
$resultado= $con->query($consulta);

$pdf=new PDF('L','cm','Legal');
$pdf->AddPage('L','Legal'); 
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',16);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(1.5);
    //-----------------------------------------------//
    $pdf->Cell(3,-1,$row['IdPedido'], 1, 0, 'C',0);
    $pdf->Cell(6,-1,$row['Cliente'], 1, 0, 'C', 0);
    $pdf->Cell(5,-1,$row['Documento'], 1, 0, 'C', 0);
    $pdf->Cell(3,-1,$row['Cantidad'],1, 0, 'C', 0);
    $pdf->Cell(4,-1,$row['Total'],1, 0, 'C' ,0);
    $pdf->Cell(4,-1,$row['Fecha'],1, 0, 'C', 0);
    $pdf->Cell(6,-1,$row['Nombre'],1, 1, 'C', 0);
    //$pdf->Cell(6,-1,$row['Nombre'], 1, 1, 'C', 0);
}


$pdf->Output();
?>