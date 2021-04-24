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
    public function BuscarProducto($IdProducto)
    {
        $producto = new Productos();
        $crudproductos = new CrudProductos();
        return $crudproductos->BuscarProducto($IdProducto);

    }

}
$ControladorProductos = new ControladorProductos();

if(isset($_POST['CrearProduc'])){

    $valid = array('success' => false, 'messages' => array());
	$IdTipoProducto = $_POST['IdTipoProducto'];
	$Nombre = $_POST['Nombre'];
	$Precio = $_POST['Precio'];
    $Descripcion = $_POST['Descripcion'];
    $Stock = $_POST['Stock'];

	$Estado = 1;

	$type = explode('.', $_FILES['Imagen']['name']);
	$type = strtolower($type[count($type)-1]);
    $url = '../Estilo/img/uploads/' . uniqid(rand()) . '.' . $type;

    if(in_array($type, array('gif', 'jpg', 'jpeg', 'png','tiff','psd','bmp'))) {
		if(is_uploaded_file($_FILES['Imagen']['tmp_name'])) {
			if(move_uploaded_file($_FILES['Imagen']['tmp_name'], $url)) {

				// insert into database
				$sql = "INSERT INTO producto (Nombre,Descripcion,Imagen,Precio,Stock,Estado,TipodeProducto) 
                VALUES ('$Nombre','$Descripcion','$url','$Precio','$Stock','$Estado',$IdTipoProducto)";
				if($conn->query($sql) === TRUE) {
					echo 
                        '<script>
                            alert("Producto registrado correctamente.");
                            window.location="../Vista/Listar_Productoadmin.php";                
                        </script>';
                        $valid['success'] = true;
                        $valid['messages'] = "Producto Agregado Correctamente";
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
elseif(isset($_GET['EditarProducto']))
{
    $IdProducto = $_GET['IdProducto'];
    $ControladorProductos->desplegarVista('../Vista/EditarProduct.php?IdProducto='.$IdProducto);
}
elseif(isset($_POST['EditarProducto']))
{
    $valid = array('success' => false, 'messages' => array());

	//$IdTipoProducto = $_POST['IdTipoProducto'];
    $Nombre = $_POST['Nombre'];
	$Precio = $_POST['Precio'];
	$Descripcion = $_POST['Descripcion'];
	$Stock = $_POST['Stock'];
    $id=(int) $_POST['IdProducto'];
        
        $type = explode('.', $_FILES['Imagen']['name']);
	    $type = $type[count($type)-1];
        $url = '../Estilo/img/uploads/' . uniqid(rand()) . '.' . $type;
  
        if(in_array($type, array('gif', 'jpg', 'jpeg', 'png','tiff','psd','bmp','JPG','GIF','JPEG','PNG'))) {
            if(is_uploaded_file($_FILES['Imagen']['tmp_name'])) {
                if(move_uploaded_file($_FILES['Imagen']['tmp_name'], $url)) 
                {
                        // insert into database
                        $sql = "UPDATE  producto SET 

                        Nombre='$Nombre',
                        Precio='$Precio',
                        Descripcion='$Descripcion',
                        Stock='$Stock',
                        Imagen='$url' 
                        WHERE IdProducto='$id'";
                        if($conn->query($sql) === TRUE) 
                        {
                        echo 
                            '<script>
                                alert("Producto actualizado correctamente.");
                                window.location="../Vista/Listar_Productoadmin.php";                
                            </script>';
                            //$valid['success'] = true;
                            //$valid['messages'] = "Producto Agregado Correctamente";
                        } 
                        else {
                            echo 
                                '<script>
                                    alert("No se puede agregar intentalo nuevamente.");
                                    window.location="../Vista/Agregar_productoadmin.php";                
                                </script>';
                            //$valid['success'] = false;
                            //$valid['messages'] = "Se Produjo un Error al Agregar";
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


?>

