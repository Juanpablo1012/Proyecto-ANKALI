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

    public function CrearServicio($Nombre,$Descripcion,$Precio)
    {
        $servicio = new Servicios();
        $crudservicios = new CrudServicios();
        $servicio->setNombre($Nombre);
        $servicio->setDescripcion($Descripcion);
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

    $valid = array('success' => false, 'messages' => array());

	$Nombre = $_POST['Nombre'];
	$Descripcion = $_POST['Descripcion'];
	$Precio = $_POST['Precio'];
	$Estado = 1;
	$type = explode('.', $_FILES['Imagen']['name']);
	$type = $type[count($type)-1];
	$url = '../Estilo/img/uploads/' . uniqid(rand()) . '.' . $type;
   
	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png'))) {
		if(is_uploaded_file($_FILES['Imagen']['tmp_name'])) {
			if(move_uploaded_file($_FILES['Imagen']['tmp_name'], $url)) {

				// insert into database
				$sql = "INSERT INTO servicios (Nombre, Descripcion, Precio, Imagen,Estado) 
                VALUES ('$Nombre','$Descripcion', '$Precio','$url','$Estado')";
				if($conn->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Producto Agregado Correctamente";
				} 
				else {
					$valid['success'] = false;
					$valid['messages'] = "Se Produjo un Error al Agregar";
				}
				$conn->close();
			}
			else {
				$valid['success'] = false;
				$valid['messages'] = "Se Produjo un Error al Agregar";
			}
		}
	}
	echo json_encode($valid);
}


    elseif(isset($_GET['Editarservicio']))
{
    $IdServicios = $_GET['IdServicios'];
    $ControladorServicios->desplegarVista('../Vista/EditarServicio.php?IdServicios='.$IdServicios);
}

elseif(isset($_POST['Editarservicio']))
{
		$Nombre=$_POST['title'];
		$Descripcion=$_POST['descrip'];
		$precio=$_POST['preci'];
		$cantidad=$_POST['cant'];
        $id=(int) $_GET['id'];
        
        $type = explode('.', $_FILES['foto2']['name']);
	    $type = $type[count($type)-1];
        $url = '../uploads/' . uniqid(rand()) . '.' . $type;
  
        if(in_array($type, array('gif', 'jpg', 'jpeg', 'png'))) {
            if(is_uploaded_file($_FILES['foto2']['tmp_name'])) {
                if(move_uploaded_file($_FILES['foto2']['tmp_name'], $url)) {
    
                    // insert into database
                    $sql = "UPDATE  productos SET name='$titulo',descripcion='$descripcion',precio='$precio',cantidad='$cantidad', image='$url' WHERE id='$id'";
    
                    if($con->query($sql) === TRUE) {
                        header('Location: ../view.php');
                    } 
                    else {
                        $valid['success'] = false;
                        $valid['messages'] = "Se Produjo un Error al Agregar";
                    }
    
                }
                else {
                    $valid['success'] = false;
                    $valid['messages'] = "Se Produjo un Error al Agregar";
                }
            }
            header('Location: ../view.php');

        }





    echo $ControladorServicios->Editarservicio($_POST['IdServicios'],$_POST['Nombre'],$_POST['Descripcion'],$_POST['Imagen'],$_POST['Precio'],$_POST['Estado']);
    $ControladorServicios->desplegarVista('../Vista/Listar_Servicioadmin.php'.$IdServicios);
}

?>

