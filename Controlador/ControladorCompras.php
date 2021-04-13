<?php
require_once("../Modelo/Conexion.php");
require_once("../Modelo/Compras.php");
//require_once("../Modelo/CrudProductos.php");


class ControladorCompras{
    public function __construct()
    {
    }

    public function desplegarVista($vista)
    {
        header("location:".$vista);

    }

    public function CrearCompra($Total,$Factura)
    {
        $compra = new Compras();
        $crudCompras = new crudCompras();
        $compra->setTotal($Total);
        $compra->setFactura($Factura);
        return $crudCompras->CrearCompra($compra);
    }



}
$ControladorCompras = new ControladorCompras();

if(isset($_POST['Agregar'])){
	$valid = array('success' => false, 'messages' => array());

	$Total = $_POST['Total'];
	$Fecha = 2021-04-12;
	$DocumentoUsuario = 1;

	$type = explode('.', $_FILES['Factura']['name']);
	$type = $type[count($type)-1];
	$url = '../Estilo/img/uploads/' . uniqid(rand()) . '.' . $type;
   
	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png'))) {
		if(is_uploaded_file($_FILES['Factura']['tmp_name'])) {
			if(move_uploaded_file($_FILES['Factura']['tmp_name'], $url)) {

				// insert into database
				$sql = "INSERT INTO compra (Total, Factura,DocumentoUsuario,Fecha) 
                VALUES ('$Total', '$url','$DocumentoUsuario','$Fe')";
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

elseif(isset($_GET['CambiarEstadoP']))
{
    $IdProducto = $_GET['IdProducto'];
     $ControladorProductos->CambiarEstadoP($IdProducto);
     $ControladorProductos->desplegarVista('../Vista/Listar_Productoadmin.php');

}
?>

