<?php
require_once("../Modelo/Conexion.php");
require_once("../Modelo/Servicios.php");
require_once("../Modelo/CrudServicios.php");


class ControladorServicios{
    public function __construct()
    {
    }

    public function desplegarVista($vista)
    {
        header("location:".$vista);

    }

    public function CrearServicio($Nombre,$Descripcion,$Imagen,$Precio)
    {
        $servicio = new Servicios();
        $crudservicios = new CrudServicios();
        $servicio->setNombre($Nombre);
        $servicio->setDescripcion($Descripcion);
        $servicio->setImagen($Imagen);
        $servicio->setPrecio($Precio);
        return $crudservicios->CrearServicio($servicio);
    }

    public function Listarservicio(){

        $crudservicios = new CrudServicios();
        return json_encode($crudservicios->Listarservicio());
    } 

    public function Buscarservicio($IdServicios)
    {
        $servicio = new Servicios();
        $crudservicios = new CrudServicios();
        return $crudservicios->Buscarservicio($IdServicios);

    }

    public function CambiarEstadoS($Documento)
    {
        $servicio = new Servicios();
        $crudservicios = new CrudServicios();
        return $crudservicios->CambiarEstadoS($Documento);

    }

    public function Editarservicio($IdServicios,$Nombre,$Descripcion,
    $Imagen,$Precio,$Estado)
    {
        $servicio = new Servicios();
        $crudservicios = new CrudServicios();
        $servicio->setIdServicios($IdServicios);
        $servicio->setNombre($Nombre);
        $servicio->setDescripcion($Descripcion);
        $servicio->setImagen($Imagen);
        $servicio->setPrecio($Precio);
        $servicio->setEstado($Estado);
        return $crudservicios->Editarservicio($servicio);

    }

    public function Listarserviciousu(){

        $crudservicios = new CrudServicios();
        return json_encode($crudservicios->Listarserviciousu());
    } 

}



$ControladorServicios = new ControladorServicios();
if(isset($_POST['AgregarServ'])){
    echo $ControladorServicios->CrearServicio($_POST['Nombre'],$_POST['Descripcion'],$_POST['Imagen'],$_POST['Precio']);
    }


    elseif(isset($_GET['Editarservicio']))
{
    $IdServicios = $_GET['IdServicios'];
    $ControladorServicios->desplegarVista('../Vista/EditarServicio.php?IdServicios='.$IdServicios);
}

elseif(isset($_POST['Editarservicio']))
{
    echo $ControladorServicios->Editarservicio($_POST['IdServicios'],$_POST['Nombre'],$_POST['Descripcion'],$_POST['Imagen'],$_POST['Precio'],$_POST['Estado']);
    $ControladorServicios->desplegarVista('../Vista/Listar_Servicioadmin.php'.$IdServicios);
}

elseif(isset($_GET['CambiarEstadoS']))
{
    $IdServicios = $_GET['IdServicios'];
     $ControladorServicios->CambiarEstadoS($IdServicios);
     $ControladorServicios->desplegarVista('../Vista/Listar_servicioadmin.php');

}

?>

