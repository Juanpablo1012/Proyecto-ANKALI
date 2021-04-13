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

	$valid = array('success' => false, 'messages' => array());

	$Total = $_POST['Total'];
	$Fecha = $_POST['Fecha'];
	$DocumentoUsuario = $_POST['DocumentoUsuario'];
	$type = explode('.', $_FILES['Factura']['name']);
	$type = $type[count($type)-1];
	$url = '../Estilo/img/uploads/' . uniqid(rand()) . '.' . $type;

	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png'))) {
		if(is_uploaded_file($_FILES['Factura']['tmp_name'])) {
			if(move_uploaded_file($_FILES['Factura']['tmp_name'], $url)) {

				// insert into database
				$sql = "INSERT INTO compra (Factura, Fecha, Total, DocumentoUsuario) 
                VALUES ('$url','$Fecha', '$Total','$DocumentoUsuario')";
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
	echo json_encode($valid);
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

elseif(isset($_POST['Editar']))
{
    $Total = $_POST['Total'];
	$Fecha = $_POST['Fecha'];
	$DocumentoUsuario = $_POST['DocumentoUsuario'];
        $id=(int) $_POST['IdCompra'];
        
        $type = explode('.', $_FILES['Factura']['name']);
	    $type = $type[count($type)-1];
        $url = '../Estilo/img/uploads/' . uniqid(rand()) . '.' . $type;
  
        if(in_array($type, array('gif', 'jpg', 'jpeg', 'png'))) {
            if(is_uploaded_file($_FILES['Factura']['tmp_name'])) {
                if(move_uploaded_file($_FILES['Factura']['tmp_name'], $url)) {
                    // insert into database
                    $sql = "UPDATE  compra SET 
                    Total='$Total',
                    Fecha='$Fecha',
                    DocumentoUsuario='$DocumentoUsuario',
                    Factura='$url' 
                    WHERE IdCompra='$id'";
    
                    if($conn->query($sql) === TRUE) {
                        echo 
                        '<script>
                            alert("Registro correctamente actualizado.");
                            window.location="../Vista/Listar_Compra.php";                
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
            echo 
            '<script>
                alert("Registro correctamente actualizado.");
                window.location="../Vista/Listar_Compra.php";                
            </script>';
        }
}
?>


