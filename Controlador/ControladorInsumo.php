<?php
require_once("../Modelo/Conexion.php");
require_once("../Modelo/Insumos.php");
require_once("../Modelo/CrudInsumos.php");


class ControladorInsumo{
    public function __construct()
    {
    }

    public function desplegarVista($vista)
    {
        header("location:".$vista);

    }

    public function CrearInsumo($NombreP,$Precio,$Imagen,$stock)
    {
        $Insumo = new Insumos();
        $crudInsumo = new CrudInsumos();
        $Insumo->setNombre($NombreP);
        $Insumo->setImagen($Imagen);
        $Insumo->setPrecio($Precio);
        $Insumo->setStock($stock);
        return $crudInsumo->CrearInsumo($Insumo);
    }

    public function ListarInsumo(){

        $crudInsumo = new CrudInsumos();
        return json_encode($crudInsumo->ListarInsumo());
    } 

    public function BuscarInsumo($IdInsumo)
    {
        $Insumo = new Insumos();
        $crudInsumo = new CrudInsumos();
        return $crudInsumo->BuscarInsumo($IdInsumo);

    }

    public function CambiarEstadoInsu($IdInsumo)
    {
        $Insumo = new Insumos();
        $crudInsumo = new CrudInsumos();
        return $crudInsumo->CambiarEstadoInsu($IdInsumo);

    }

    // public function EditarInsumo($IdServicios,$Nombre,
    // $Imagen,$Precio,$Stock,$Estado)
    // {
    //     $Insumo = new Insumos();
    //     $crudInsumo = new CrudInsumos();
    //     $Insumo->setIdinsumo($IdServicios);
    //     $Insumo->setNombre($Nombre);
    //     $Insumo->setImagen($Imagen);
    //     $Insumo->setPrecio($Precio);
    //     $Insumo->setPrecio($Precio);
    //     $Insumo->setEstado($Estado);
    //     return $crudInsumo->EditarInsumo($Insumo);
    // }

    // public function Listarserviciousu(){

    //     $crudInsumo = new CrudInsumos();

    //     return json_encode($crudservicios->Listarserviciousu());
    // } 

}



$ControladorInusmo = new ControladorInsumo();

if(isset($_POST['AgregarInsumo'])){
    $valid = array('success' => false, 'messages' => array());
	$Nombre = $_POST['Nombre'];
	$Precio = $_POST['Precio'];
    $stock = $_POST['Stock'];
	$Estado = 1;
	$type = explode('.', $_FILES['Imagen']['name']);
	$type = strtolower($type[count($type)-1]);
	$url = '../Estilo/img/uploads/' . uniqid(rand()) . '.' . $type;

	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png','tiff','psd','bmp'))) {
		if(is_uploaded_file($_FILES['Imagen']['tmp_name'])) {
			if(move_uploaded_file($_FILES['Imagen']['tmp_name'], $url)) {

				// insert into database
				$sql = "INSERT INTO insumos (Nombre,Imagen,Precio,Stock,Estado) 
                VALUES ('$Nombre','$url','$Precio','$stock','$Estado')";
				if($conn->query($sql) === TRUE) {
					echo 
                '<script>
                    alert("Servicio registrado correctamente.");
                    window.location="../Vista/Listar_Insumo.php";                
                </script>';
				} 
				else {
					echo 
                '<script>
                    alert("No se puede agregar intentalo nuevamente.");
                    window.location="../Vista/Agregar_Insumo.php";                
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
    echo $Nombre, $Stock, $Precio,  $Estado,   $url;
	echo json_encode($valid);
}

elseif(isset($_GET['EditarInsumo']))
{
    $Idinsumo = $_GET['Idinsumo'];
    $ControladorInusmo->desplegarVista('../Vista/EditarInsumo.php?IdInsumo='.$Idinsumo);
}

elseif(isset($_POST['EditarInsumos']))
{
		$Nombre=$_POST['Nombre'];
		$Stock=$_POST['Stock'];
		$Precio=$_POST['Precio'];
        $id=(int) $_POST['IdInsumo'];
        
        $type = explode('.', $_FILES['Imagen']['name']);
	    $type = $type[count($type)-1];
        $url = '../Estilo/img/uploads/' . uniqid(rand()) . '.' . $type;
  
        if(in_array($type, array('gif', 'jpg', 'jpeg', 'png','tiff','psd','bmp','JPG','GIF','JPEG','PNG'))) {
            if(is_uploaded_file($_FILES['Imagen']['tmp_name'])) {
                if(move_uploaded_file($_FILES['Imagen']['tmp_name'], $url)) {
                    // insert into database
                    $sql = "UPDATE  insumos SET 
                    Nombre='$Nombre',
                    Imagen='$url',
                    Precio='$Precio',
                    Stock = '$Stock'
                    WHERE IdInsumo='$id'";
    
                    if($conn->query($sql) === TRUE) {
                        echo 
                        '<script>
                            alert("Servicio registrado correctamente.");
                            window.location="../Vista/Listar_Insumo.php";                
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

elseif(isset($_GET['CambiarEstadoInsu']))
{
    $Idinsumo = $_GET['Idinsumo'];
     $ControladorInusmo->CambiarEstadoInsu($Idinsumo);
     $ControladorInusmo->desplegarVista('../Vista/Listar_Insumo.php');

}
?>

