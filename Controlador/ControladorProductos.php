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

    public function CrearProducto($NombreP,$Precio,$Stock)
    {
        $producto = new Productos();
        $crudproductos = new CrudProductos();
        $producto->setNombreP($NombreP);
        $producto->setPrecio($Precio);
        $producto->setStock($Stock);
        return $crudproductos->CrearProducto($producto);
    }

    public function Listarproducto(){

        $crudproducto = new CrudProductos();
        return json_encode($crudproducto->Listarproducto());
    } 

    public function Listarproductousu(){

        $crudproducto = new CrudProductos();
        return json_encode($crudproducto->Listarproductousu());
    } 


}

$ControladorProductos = new ControladorProductos();
if(isset($_POST['CrearProduc'])){

    echo $ControladorProductos->CrearProducto($_POST['Nombre'],$_POST['Precio'],$_POST['Stock']);
    }

?>

