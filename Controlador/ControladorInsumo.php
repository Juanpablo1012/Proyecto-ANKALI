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

    if (trim($Nombre) == null || trim($Precio) == null || trim($stock) == null || trim($type) == null){
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
                    $sql = "INSERT INTO insumos (Nombre,Imagen,Precio,Stock,Estado) 
                    VALUES ('$Nombre','$url','$Precio','$stock','$Estado')";
                    if($conn->query($sql) === TRUE) {
                        echo 
                            "<script>
                                Swal.fire({
                                    icon: 'success',
                                    html: '<h3>Insumo registrado exitosamente.</h3>',
                                    closeOnClickOutside: false,
                                    allowOutsideClick: false,
                                    background: '#fff',
                                    confirmButtonColor: '#FC3E3E',
                                    confirmButtonText: 'Cerrar'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '../Vista/Listar_Insumo.php';
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
        $type = strtolower($type[count($type)-1]);
        $url = '../Estilo/img/uploads/' . uniqid(rand()) . '.' . $type;

        if (trim($Nombre) == null || trim($Stock) == null || trim($Precio) == null || trim($type) == null){
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
                            "<script>
                                Swal.fire({
                                    icon: 'success',
                                    html: '<h3>Insumo actualizado exitosamente.</h3>',
                                    closeOnClickOutside: false,
                                    allowOutsideClick: false,
                                    background: '#fff',
                                    confirmButtonColor: '#FC3E3E',
                                    confirmButtonText: 'Cerrar'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '../Vista/Listar_Insumo.php';
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
}

elseif(isset($_GET['CambiarEstadoInsu']))
{
    $Idinsumo = $_GET['Idinsumo'];
     $ControladorInusmo->CambiarEstadoInsu($Idinsumo);
     $ControladorInusmo->desplegarVista('../Vista/Listar_Insumo.php');

}
?>

