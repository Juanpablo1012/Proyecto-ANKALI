<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

</head>
<body>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>
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
    
    if (trim($Total) == null || trim($Fecha) == null || trim($DocumentoUsuario) == null || trim($type) == null)
    {
        echo 
        "<script>
        Swal.fire({
            icon: 'warning',
            html: '<h3>Todos los campos son obligatorios.</h3>',
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
        if(strtolower(in_array($type, array('gif', 'jpg', 'jpeg', 'png','tiff','psd','bmp','JPG','GIF','JPEG','PNG')))) {
            if(is_uploaded_file($_FILES['Factura']['tmp_name'])) {
                if(move_uploaded_file($_FILES['Factura']['tmp_name'], $url)) {
    
                    // insert into database
                    $sql = "INSERT INTO compra (Factura, Fecha, Total, DocumentoUsuario) 
                    VALUES ('$url','$Fecha', '$Total','$DocumentoUsuario')";
                    if($conn->query($sql) === TRUE) {
                        echo 
                        "<script>
                            Swal.fire({
                                icon: 'success',
                                html: '<h3>Compra registrada exitosamente.</h3>',
                                allowOutsideClick: false,
                                background: '#fff',
                                confirmButtonColor: '#FC3E3E',
                                confirmButtonText: 'Cerrar'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '../Vista/Listar_Compra.php';
                                }
                            });
                            </script>";
                    } 
                    
                    $conn->close();
                }
                else {
                    "<script>
                    Swal.fire({
                        icon: 'error',
                        html: '<h3>Parece que a ocurrido un error. <br>Intentalo nuevamente.</h3>',
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
            }
        
    }

    }

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
        if (trim($Total) == null || trim($Fecha) == null || trim($DocumentoUsuario) == null || trim($type) == null)
        {
            echo 
            "<script>
            Swal.fire({
                icon: 'warning',
                html: '<h3>Todos los campos son obligatorios.</h3>',
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
                            "<script>
                            Swal.fire({
                                icon: 'success',
                                html: '<h3>Compra actualizada exitosamente.</h3>',
                                allowOutsideClick: false,
                                background: '#fff',
                                confirmButtonColor: '#FC3E3E',
                                confirmButtonText: 'Cerrar'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '../Vista/Listar_Compra.php';
                                }
                            });
                            </script>";
                        } 
                        else {
                            "<script>
                                Swal.fire({
                                    icon: 'error',
                                    html: '<h3>Parece que a ocurrido un error. <br>Intentalo nuevamente.</h3>',
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
        
                    }
                }
            }
        }
        
}

?>

