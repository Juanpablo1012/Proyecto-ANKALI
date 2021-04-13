<?php
require_once("../Modelo/Conexion.php");
require_once("../Modelo/Compras.php");
require_once("../Modelo/CrudCompra.php");


class ControladorCompras{
    public function __construct()
    {
    }

    public function desplegarVista($vista)
    {
        header("location:".$vista);
    }

    public function CrearCompra($Factura,$Fecha,$Total,$DocumentoUsuario)
    {
        $compra = new Compras();
        $crudCompra = new CrudCompra();
        $compra->setFactura($Factura);
        $compra->setFecha($Fecha);
        $compra->setTotal($Total);
        $compra->setDocumentoUsuario($DocumentoUsuario);
        return $crudCompra->CrearCompra($compra);
    }

    public function ListarCompra()
    {
        $crudCompra= new CrudCompra();
        return json_encode($crudCompra->ListarCompra());
    }

    public function BuscarCompra($Compra)
    {
        $Compras = new Compras();
        $crudCompra= new CrudCompra();
        return $crudCompra->BuscarCompra($Compra);

    }
}
$ControladorCompras = new ControladorCompras();

if(isset($_POST['Agregar'])){
	echo $ControladorCompras->CrearCompra(
		$_POST['Factura'],
        $_POST['Fecha'],
		$_POST['Total'],
		$_POST['DocumentoUsuario']);
	}

    elseif(isset($_GET['EditarCompra']))
    {
        $IdCompra = $_GET['IdCompra'];
        $ControladorCompras->desplegarVista('../Vista/EditarCompras.php?IdCompra='.$IdCompra);
    }
    
    elseif(isset($_POST['EditarCompra']))
    {
        echo $ControladorCompras->EditarCompra($_POST['IdCompra'],$_POST['Factura'],$_POST['Fecha'],$_POST['Total'],$_POST['DocumentoUsuario']);
        $ControladorCompras->desplegarVista('../Vista/EditarCompras.php'.$IdCompra);
    }
?>


