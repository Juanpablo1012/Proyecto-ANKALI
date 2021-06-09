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

</html>
<?php
require_once("../Modelo/Conexion.php");
require_once("../Modelo/Productos.php");
require_once("../Modelo/CrudProductos.php");
require_once("../Modelo/Insumos.php");
require_once("../Modelo/CrudInsumos.php");
require_once("../Modelo/dllproducto.php");



class ControladorProductos{
    public function __construct()
    {
    }

    public function desplegarVista($vista)
    {
        header("location:".$vista);

    }

    public function Listarinsumo(){

        $CrudInsumos = new CrudInsumos();
        return $CrudInsumos->ListarInsumo();
    }



    public function CambiarEstadoP($Documento)
    {
        $producto = new Productos();
        $crudproductos = new CrudProductos();
        return $crudproductos->CambiarEstadoP($Documento);

    }

    public function registrardetalleInsumo($IdProducto,$Idinsumo,$Total,$Cantidad)
    {
        $dllproducto = new dllproducto();
        $crudproductos = new CrudProductos();
        $dllproducto->setIdProducto($IdProducto);
        $dllproducto->setIdInsumo($Idinsumo);
        $dllproducto->setCantidad($Cantidad);
        $dllproducto->setTotal($Total);
        return $crudproductos->registrardetalleInsumo($dllproducto);
    
    }

    public function Listardetalleinsu($idpedido){

        $crudproductos = new CrudProductos();
        return $crudproductos->Listardetalleinsu($idpedido);
    }
   



    public function CrearProducto($NombreP,$Precio,$Imagen,$TipoProducto)
    {
        $producto = new Productos();
        $crudproductos = new CrudProductos();
        $producto->setNombre($NombreP);
        $producto->setPrecio($Precio);
        $producto->setImagen($Imagen);
        $producto->setTipoProducto($TipoProducto);
        return $crudproductos->CrearProducto($producto);
    }

    public function Listarproducto(){

        $crudproducto = new CrudProductos();
        return json_encode($crudproducto->Listarproducto());
    } 

    public function ListarServicio(){

        $crudproducto = new CrudProductos();
        return json_encode($crudproducto->ListarServicio());
    } 

    public function ListarTipoproducto(){

        $crudproducto = new CrudProductos();
        return json_encode($crudproducto->ListarTipoproducto());
    } 

    

    public function Listarserviciosusu(){

        $crudproducto = new CrudProductos();
        return json_encode($crudproducto->Listarserviciosusu());
    } 

    public function ProductoBusca($id){ 

        $crudproducto = new CrudProductos();
        return json_encode($crudproducto->ProductoBusca($id));
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

    public function Listarinsumousu(){

        $crudproducto = new CrudProductos();
        return json_encode($crudproducto->Listarinsumousu());
    } 

    public function eliminardetalle($iddetallepedido){

        $crudproducto = new CrudProductos();
        return $crudproducto->eliminardetalle($iddetallepedido);
    }

}
$ControladorProductos = new ControladorProductos();

if(isset($_POST['CrearProduc'])){

    $valid = array('success' => false, 'messages' => array());
	$IdTipoProducto = $_POST['IdTipoProducto'];
	$Nombre = $_POST['Nombre'];
	$Precio = $_POST['Precio'];

	$Estado = 1;

	$type = explode('.', $_FILES['Imagen']['name']);
	$type = strtolower($type[count($type)-1]);
    $url = '../Estilo/img/uploads/' . uniqid(rand()) . '.' . $type;

    if(in_array($type, array('gif', 'jpg', 'jpeg', 'png','tiff','psd','bmp'))) {
		if(is_uploaded_file($_FILES['Imagen']['tmp_name'])) {
			if(move_uploaded_file($_FILES['Imagen']['tmp_name'], $url)) {

				// insert into database
				$sql = "INSERT INTO producto (Nombre,Imagen,Precio,Estado,TipodeProducto) 
                VALUES ('$Nombre','$url','$Precio','$Estado',$IdTipoProducto)";
				if($conn->query($sql) === TRUE) {
					echo 
                        '<script>
                            alert("Producto registrado correctamente.");
                                window.location="../Vista/Agregar_productoadmin.php";               


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
    $id=(int) $_POST['IdProducto'];
        
        $type = explode('.', $_FILES['Imagen']['name']);
        $type = strtolower($type[count($type)-1]);
        $url = '../Estilo/img/uploads/' . uniqid(rand()) . '.' . $type;
  
        if(in_array($type, array('gif', 'jpg', 'jpeg', 'png','tiff','psd','bmp','JPG','GIF','JPEG','PNG'))) {
            if(is_uploaded_file($_FILES['Imagen']['tmp_name'])) {
                if(move_uploaded_file($_FILES['Imagen']['tmp_name'], $url)) 
                {
                        // insert into database
                        $sql = "UPDATE  producto SET 

                        Nombre='$Nombre',
                        Precio='$Precio',
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

//---------------------------------SERVICIOS--------------------------------------//

elseif(isset($_POST['CrearServi'])){

    $valid = array('success' => false, 'messages' => array());
	$IdTipoProducto = $_POST['IdTipoProducto'];
	$Nombre = $_POST['Nombre'];
	$Precio = $_POST['Precio'];

	$Estado = 1;

	$type = explode('.', $_FILES['Imagen']['name']);
	$type = strtolower($type[count($type)-1]);
    $url = '../Estilo/img/uploads/' . uniqid(rand()) . '.' . $type;

    if (trim($Nombre) == null || trim($Precio) == null || trim($type) == null){
        echo 
        "<script>
        Swal.fire({
            icon: 'warning',
            html: '<h3>Todos los campos son obligatorios.</h3>',
            closeOnClickOutside: false,
            allowOutsideClick: false,
            background: '#fff',
            confirmButtonColor: '#FC3E3E',
            confirmButtonText: 'Cerrar'
          }).then((result) => {
            if (result.isConfirmed) {
                window.history.back();
            }
          });
          </script>";
    }else{
        if(in_array($type, array('gif', 'jpg', 'jpeg', 'png','tiff','psd','bmp'))) {
            if(is_uploaded_file($_FILES['Imagen']['tmp_name'])) {
                if(move_uploaded_file($_FILES['Imagen']['tmp_name'], $url)) {
    
                    // insert into database
                    $sql = "INSERT INTO producto (Nombre,Imagen,Precio,Estado,TipodeProducto) 
                    VALUES ('$Nombre','$url','$Precio','$Estado',$IdTipoProducto)";
                    if($conn->query($sql) === TRUE) {
                        echo 
                            "<script>
                                Swal.fire({
                                    icon: 'success',
                                    html: '<h3>Servicio registrado exitosamente.</h3>',
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
                }
            }
        }
        else{
            echo 
            "<script>
                Swal.fire({
                    icon: 'error',
                    html: '<h3>Parece que ha ocurrido un error, intentalo nuevamente.</h3>',
                    closeOnClickOutside: false,
                    allowOutsideClick: false,
                    background: '#fff',
                    confirmButtonColor: '#FC3E3E',
                    confirmButtonText: 'Cerrar',
                    closeOnClickOutside: false
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.history.back();
                    }
                });
                </script>";    }
    }

    
}

elseif(isset($_GET['EditarServicio']))
{
    $IdProducto = $_GET['IdProducto'];
    $ControladorProductos->desplegarVista('../Vista/EditarServicio.php?IdProducto='.$IdProducto);
}

elseif(isset($_POST['EditarServicio']))
{
    $valid = array('success' => false, 'messages' => array());

	//$IdTipoProducto = $_POST['IdTipoProducto'];
    $Nombre = $_POST['Nombre'];
	$Precio = $_POST['Precio'];
    $id=(int) $_POST['IdProducto'];
        
    $type = explode('.', $_FILES['Imagen']['name']);
	$type = strtolower($type[count($type)-1]);
    $url = '../Estilo/img/uploads/' . uniqid(rand()) . '.' . $type;

    if (trim($Nombre) == null || trim($Precio) == null || trim($type) == null){
        echo 
        "<script>
        Swal.fire({
            icon: 'warning',
            html: '<h3>Todos los campos son obligatorios.</h3>',
            closeOnClickOutside: false,
            allowOutsideClick: false,
            background: '#fff',
            confirmButtonColor: '#FC3E3E',
            confirmButtonText: 'Cerrar'
          }).then((result) => {
            if (result.isConfirmed) {
                window.history.back();
            }
          });
          </script>";
    }

        if(in_array($type, array('gif', 'jpg', 'jpeg', 'png','tiff','psd','bmp'))) {
            if(is_uploaded_file($_FILES['Imagen']['tmp_name'])) {
                if(move_uploaded_file($_FILES['Imagen']['tmp_name'], $url)) 
                {
                        // insert into database
                        $sql = "UPDATE  producto SET 

                        Nombre='$Nombre',
                        Precio='$Precio',
                        Imagen='$url' 
                        WHERE IdProducto='$id'";
                        if($conn->query($sql) === TRUE) 
                        {
                            echo 
                            "<script>
                                Swal.fire({
                                    icon: 'success',
                                    html: '<h3>Servicio actualizado exitosamente.</h3>',
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
                    }
                }
            }else{
                echo 
            "<script>
                Swal.fire({
                    icon: 'error',
                    html: '<h3>Parece que ha ocurrido un error, intentalo nuevamente.</h3>',
                    closeOnClickOutside: false,
                    allowOutsideClick: false,
                    background: '#fff',
                    confirmButtonColor: '#FC3E3E',
                    confirmButtonText: 'Cerrar',
                    closeOnClickOutside: false
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.history.back();
                    }
                });
                </script>";
            }
}

elseif(isset($_GET['CambiarEstadoS']))
{
    $IdProducto = $_GET['IdProducto'];
     $ControladorProductos->CambiarEstadoP($IdProducto);
     $ControladorProductos->desplegarVista('../Vista/Listar_Servicioadmin.php');
}

//---------------------------------INSUMOS--------------------------------------//

elseif(isset($_POST['registrarinsumo']))
{
    $ControladorProductos->registrardetalleInsumo($_POST['productoid'],$_POST['producto'],$_POST['Cantidad'],$_POST['Total']);
}

elseif(isset($_POST['ListarDetallepinsumo']))
{
    $productoid = $_POST['productoid'];
    require_once('../Vista/Listar_Dtinsuprodu.php');
}

elseif(isset($_GET['Agregarins']))
{
    $IdProducto = $_GET['IdProducto'];
    $ControladorProductos->desplegarVista('../Vista/Agregar_insumoaproducto.php?IdProducto='.$IdProducto);
}

elseif(isset($_GET['Verdetalleinsu']))
{
    $IdProducto = $_GET['IdProducto'];
    $ControladorProductos->desplegarVista('../Vista/Verdetalleinsu.php?IdProducto='.$IdProducto);
    $ControladorProductos->Listardetalleinsu($IdProducto);
}

elseif(isset($_POST['eliminardetalle']))
{
    $iddetalle = $_POST['IdDeProducto'];
    echo $ControladorProductos->eliminardetalle($iddetalle);

}
?>

