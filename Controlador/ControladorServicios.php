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

}

$ControladorServicios = new ControladorServicios();
if(isset($_POST['AgregarServ'])){

    echo $ControladorServicios->CrearServicio($_POST['Nombre'],$_POST['Descripcion'],$_POST['Imagen'],$_POST['Precio']);
    }

?>

