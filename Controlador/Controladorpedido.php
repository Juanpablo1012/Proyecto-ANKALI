<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ANKALI</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
        <link href="../Estilo/css/style.css" rel="stylesheet">
        <link href="../Estilo/img/logo-negro.png" rel="icon">
        <link href="../Estilo/img/apple-touch-icon.png" rel="apple-touch-icon">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    </head>
    <body>
        
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html><?php
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

    public function Listarpedidousuario($document){

        $crudpedido = new CrudPedido();
        return $crudpedido->Listarpedidousuario($document);
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

elseif(isset($_GET['Verdetalleusu']))
{
    $idpedido = $_GET['Idpedido'];
    $ControladorPedido->desplegarVista('../Vista/Verdetalleusu.php?Idpedido='.$idpedido);
    $ControladorPedido->ListardetallePedido($idpedido);
}

elseif(isset($_GET['CambiarEstadoDetallePedido']))
{
    $Idpedido = $_GET['IdPedido'];

     $ControladorPedido->CambiarEstadoDetallePedido($Idpedido);
     $ControladorPedido->desplegarVista('../Vista/Listar_Pedidoadmin.php');

}

elseif(isset($_POST['Finalizar']))
{
    echo 
    "<script>
        Swal.fire({
            icon: 'success',
            html: '<h3>Producto registrado exitosamente.</h3>',
            closeOnClickOutside: false,
            allowOutsideClick: false,
            background: '#fff',
            confirmButtonColor: '#FC3E3E',
            confirmButtonText: 'Cerrar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '../Vista/Listar_Servicioadmin.php';
            }
        });
        </script>";
}
?>