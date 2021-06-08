<?php
// session_start();
require_once("../Modelo/Conexion.php");
require_once("../Modelo/Usuarios.php");

require_once("../Modelo/Pedidos.php");
require_once("../Modelo/CrudUsuarios.php");
require_once("../Modelo/CrudProductos.php");
require_once("../Modelo/CrudPedido.php");
require_once("../Modelo/Dtlpedidos.php");

class ControladorPedido
{


    public function Listarpedido(){

        $crudpedido = new CrudPedido();
        return $crudpedido->Listarpedido();
    }

    public function Listarpedidopago(){

        $crudpedido = new CrudPedido();
        return $crudpedido->Listarpedidopago();
    }



    public function Listarusuarios(){

        $crudusu = new CrudUsuarios();
        return $crudusu->Listarusuarios();
    }


    public function ListarTodo(){

        $crudproducto = new CrudProductos();
        return $crudproducto->ListarTodo();
    } 


    public function ListardetallePedido($idpedido){

        $crudpedido = new CrudPedido();
        return $crudpedido->ListardetallePedido($idpedido);
    }
   

    // aparte

    public function consultarprecioP($idproducto){

        $crudproducto = new CrudProductos();
        return $crudproducto->consultarprecioP($idproducto);
    } 



    public function CrearPedido($usuario){

        $pedido = new Pedidos();
        $crudpedido= new CrudPedido();
        $pedido->setDocumento($usuario);
        return $crudpedido->CrearPedido($pedido);
    } 

    public function registrardetallepedido($IdPedido,$IdProducto,$Total,$Cantidad)
    {
        $detallepedido = new DtlPedidos();
        $crudpedido= new CrudPedido();
        $detallepedido->setIdPedido($IdPedido);
        $detallepedido->setIdProducto($IdProducto);
        $detallepedido->setTotal($Total);
        $detallepedido->setCantidad($Cantidad);
        return $crudpedido->registrardetallepedido($detallepedido);
    
    }

    public function eliminardetallepedido($iddetallepedido){

        $crudpedido = new CrudPedido();
        return $crudpedido->eliminardetallepedido($iddetallepedido);
    }

    public function desplegarVista($vista)
    {
        header("location:".$vista);

    }

    public function CambiarEstadoDetallePedido($id)
    {
        $pedido = new Pedidos();
        $crudpedido = new CrudPedido();
        return $crudpedido->CambiarEstadoDetallePedido($id);

    }


}

$ControladorPedido = new ControladorPedido();



if(isset($_POST['registrarpedido']))
{
    $idpedido = $_POST['pedido'];

    if($_POST['pedido']==""){
    $idpedido= $ControladorPedido->CrearPedido($_POST['usuario']);
    }

    $ControladorPedido->registrardetallepedido($idpedido,$_POST['producto'],$_POST['Precio'],1);
    
        echo $idpedido;

} 

elseif(isset($_POST['eliminardetallepedido']))
{
    $iddetalle = $_POST['IdDtllPedido'];
    echo $ControladorPedido->eliminardetallepedido($iddetalle);

}

elseif(isset($_POST['ListarDetallepedio']))
{
    $idpedido = $_POST['pedido']; 
    require_once('../Vista/Listar_Dtpedido.php');
}

elseif(isset($_GET['Verdetalle']))
{
    $idpedido = $_GET['Idpedido'];
    $ControladorPedido->desplegarVista('../Vista/Verdetalle.php?Idpedido='.$idpedido);
    $ControladorPedido->ListardetallePedido($idpedido);
}

elseif(isset($_GET['CambiarEstadoDetallePedido']))
{
    $Idpedido = $_GET['IdPedido'];

     $ControladorPedido->CambiarEstadoDetallePedido($Idpedido);
     $ControladorPedido->desplegarVista('../Vista/Listar_Pedidoadmin.php');

}

?>