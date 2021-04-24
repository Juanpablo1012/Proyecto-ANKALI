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
    $valid = array('success' => false, 'messages' => array());
	$Nombre = $_POST['Nombre'];
	$Descripcion = $_POST['Descripcion'];
	$Precio = $_POST['Precio'];
	$Estado = 1;
	$type = explode('.', $_FILES['Imagen']['name']);
	$type = strtolower($type[count($type)-1]);
	$url = '../Estilo/img/uploads/' . uniqid(rand()) . '.' . $type;

	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png','tiff','psd','bmp'))) {
		if(is_uploaded_file($_FILES['Imagen']['tmp_name'])) {
			if(move_uploaded_file($_FILES['Imagen']['tmp_name'], $url)) {

				// insert into database
				$sql = "INSERT INTO servicios (Nombre, Imagen, Descripcion, Precio,Estado) 
                VALUES ('$Nombre','$url','$Descripcion', '$Precio','$Estado')";
				if($conn->query($sql) === TRUE) {
					echo 
                '<script>
                    alert("Servicio registrado correctamente.");
                    window.location="../Vista/Listar_Servicioadmin.php";                
                </script>';
				} 
				else {
					echo 
                '<script>
                    alert("No se puede agregar intentalo nuevamente.");
                    window.location="../Vista/Agregar_servicioadmin.php";                
                </script>';
				}
				$conn->close();
			}
			else {
				$valid['success'] = false;
				$valid['messages'] = "Se Produjo un Error al Agregar";
			}
		}
	}
    echo $Nombre, $Descripcion, $Precio,  $Estado,   $url;
	echo json_encode($valid);
}

elseif(isset($_GET['Editarservicio']))
{
    $IdServicios = $_GET['IdServicios'];
    $ControladorServicios->desplegarVista('../Vista/EditarServicio.php?IdServicios='.$IdServicios);
}

elseif(isset($_POST['Editarservicio']))
{
		$Nombre=$_POST['Nombre'];
		$Descripcion=$_POST['Descripcion'];
		$Precio=$_POST['Precio'];
        $id=(int) $_POST['IdServicios'];
        
        $type = explode('.', $_FILES['Imagen']['name']);
	    $type = $type[count($type)-1];
        $url = '../Estilo/img/uploads/' . uniqid(rand()) . '.' . $type;
  
        if(in_array($type, array('gif', 'jpg', 'jpeg', 'png','tiff','psd','bmp','JPG','GIF','JPEG','PNG'))) {
            if(is_uploaded_file($_FILES['Imagen']['tmp_name'])) {
                if(move_uploaded_file($_FILES['Imagen']['tmp_name'], $url)) {
                    // insert into database
                    $sql = "UPDATE  servicios SET 
                    Nombre='$Nombre',
                    Imagen='$url',
                    Descripcion='$Descripcion',
                    Precio='$Precio'
                    WHERE IdServicios='$id'";
    
                    if($conn->query($sql) === TRUE) {
                        echo 
                        '<script>
                            alert("Servicio registrado correctamente.");
                            window.location="../Vista/Listar_Servicioadmin.php";                
                        </script>';
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
            echo $Nombre, $Descripcion, $Precio,   $url;
	echo json_encode($valid);
}

}
elseif(isset($_GET['CambiarEstadoS']))
{
    $IdServicios = $_GET['IdServicios'];
     $ControladorServicios->CambiarEstadoS($IdServicios);
     $ControladorServicios->desplegarVista('../Vista/Listar_servicioadmin.php');

}
?>

