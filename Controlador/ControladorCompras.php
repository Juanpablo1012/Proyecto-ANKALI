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

    public function CambiarEstadoP($Documento)
    {
        $producto = new Productos();
        $crudproductos = new CrudProductos();
        return $crudproductos->CambiarEstadoP($Documento);

    }

    public function CrearProducto($NombreP,$Precio,$Imagen,$Descripcion,$Stock,$TipoProducto)
    {
        $producto = new Productos();
        $crudproductos = new CrudProductos();
        $producto->setNombreP($NombreP);
        $producto->setPrecio($Precio);
        $producto->setImagen($Imagen);
        $producto->setDescripcion($Descripcion);
        $producto->setStock($Stock);
        $producto->setTipoProducto($TipoProducto);
        return $crudproductos->CrearProducto($producto);
    }

    public function Listarproducto(){

        $crudproducto = new CrudProductos();
        return json_encode($crudproducto->Listarproducto());
    } 

    public function ListarTipoproducto(){

        $crudproducto = new CrudProductos();
        return json_encode($crudproducto->ListarTipoproducto());
    } 

    public function Listarproductousu(){

        $crudproducto = new CrudProductos();
        return json_encode($crudproducto->Listarproductousu());
    } 


}
$ControladorProductos = new ControladorProductos();
if(isset($_POST['CrearProduc'])){
    $valid = array('success' => false, 'messages' => array());

	$Nombre = $_POST['Nombre'];
	$Descripcion = $_POST['Descripcion'];
	$Precio = $_POST['Precio'];
	$Stock = $_POST['Stock'];
	$IdTipoProducto = $_POST['IdTipoProducto'];

	$Estado = 1;
	$type = explode('.', $_FILES['Imagen']['name']);
	$type = $type[count($type)-1];
	$url = '../Estilo/img/uploads/' . uniqid(rand()) . '.' . $type;
   
	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png'))) {
		if(is_uploaded_file($_FILES['Imagen']['tmp_name'])) {
			if(move_uploaded_file($_FILES['Imagen']['tmp_name'], $url)) {

				// insert into database
				$sql = "INSERT INTO producto (Nombre, Descripcion, Precio, Stock,TipodeProducto,Imagen,Estado) 
                VALUES ('$Nombre','$Descripcion', '$Precio','$Stock','$IdTipoProducto','$url','$Estado')";
				if($conn->query($sql) === TRUE) {
					echo 
                        '<script>
                            alert("Producto registrado exitosamente.");
                            window.location="../Vista/Listar_Productoadmin.php";                
                        </script>';
				} 
				else {
					echo 
                        '<script>
                            alert("No se puede agregar intentalo nuevamente.");
                            window.location="../Vista/Agregar_productoadmin.php";                
                        </script>';
				}
				$conn->close();
			}
			else {
				echo 
                    '<script>
                        alert("No se puede agregar intentalo nuevamente.");
                        window.location="../Vista/Agregar_productoadmin.php";                
                    </script>';
			}
		}
	}
	echo json_encode($valid);
    //echo $ControladorProductos->CrearProducto($_POST['Nombre'],$_POST['Precio'],$_POST['Imagen'],$_POST['Descripcion'],$_POST['Stock'],$_POST['IdTipoProducto']);
}

    elseif(isset($_GET['CambiarEstadoP']))
{
    $IdProducto = $_GET['IdProducto'];
     $ControladorProductos->CambiarEstadoP($IdProducto);
     $ControladorProductos->desplegarVista('../Vista/Listar_Productoadmin.php');

}



?>

