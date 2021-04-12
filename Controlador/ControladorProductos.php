<?php
require_once("../Modelo/Conexion.php");
require_once("../Modelo/Productos.php");
require_once("../Modelo/CrudProductos.php");


class ControladorProductos{
    public function __construct()
    {
    }

    public function desplegarVista($vista)
    {
        header("location:".$vista);

    }

    public function CambiarEstadoP($Documento)
    {
        $producto = new Productos();
        $crudproductos = new CrudProductos();
        return $crudproductos->CambiarEstadoP($Documento);

    }

    public function CrearProducto($NombreP,$Precio,$Imagen,$Descripcion,$Stock,$TipoProducto)
    {
        $producto = new Productos();
        $crudproductos = new CrudProductos();
        $producto->setNombreP($NombreP);
        $producto->setPrecio($Precio);
        $producto->setImagen($Imagen);
        $producto->setDescripcion($Descripcion);
        $producto->setStock($Stock);
        $producto->setTipoProducto($TipoProducto);
        return $crudproductos->CrearProducto($producto);
    }

    public function Listarproducto(){

        $crudproducto = new CrudProductos();
        return json_encode($crudproducto->Listarproducto());
    } 

    public function ListarTipoproducto(){

        $crudproducto = new CrudProductos();
        return json_encode($crudproducto->ListarTipoproducto());
    } 

    public function Listarproductousu(){

        $crudproducto = new CrudProductos();
        return json_encode($crudproducto->Listarproductousu());
    } 


}

$ControladorProductos = new ControladorProductos();
if(isset($_POST['CrearProduc'])){

    echo $ControladorProductos->CrearProducto($_POST['Nombre'],$_POST['Precio'],$_POST['Imagen'],$_POST['Descripcion'],$_POST['Stock'],$_POST['IdTipoProducto']);
    }

    elseif(isset($_GET['CambiarEstadoP']))
{
    $IdProducto = $_GET['IdProducto'];
     $ControladorProductos->CambiarEstadoP($IdProducto);
     $ControladorProductos->desplegarVista('../Vista/Usuariosadmin.php');

}



?>

