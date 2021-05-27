<?php
session_start();
include '../Modelo/Conexion2.php';

  date_default_timezone_set('America/Panama');
  $fechaA=date("Y-m-d H:i:s");
  $estado = 1;



$arreglo=$_SESSION['carrito'];
$numeropedido = 0;
$usuario = $_SESSION['Documento'];
$sql=("SELECT * FROM pedido");
    $rec=$con->query($sql);
    while ($f = $rec->fetch_array()) {        
        $numeropedido = $f['IdPedido'];
    }

    if($numeropedido == 0){
        $numeropedido = 0;
    }else{
        $numeropedido++;
    }
    
        $sql=("INSERT into pedido (Documento,Fecha,Estado) values(
            ".$usuario.",
            '".$fechaA."',
            '".$estado."'
            )");
        $query = $con->query($sql);
    

        for($i=0; $i<count($arreglo);$i++){
            $sql=("INSERT into dllpedido (IdProducto,IdPedido,Total,Cantidad) values(
				'".$arreglo[$i]['IdProducto']."',	
				".$numeropedido.",
				'".($arreglo[$i]['precio']*$arreglo[$i]['cantidad'])."',
				'".$arreglo[$i]['cantidad']."'
				)");
        }

        for($i=0; $i<count($arreglo);$i++){
			$sql=("INSERT into dllpedido (IdProducto,IdPedido,Total,Cantidad) values(
				'".$arreglo[$i]['IdProducto']."',	
				".$numeropedido.",
				'".($arreglo[$i]['precio']*$arreglo[$i]['cantidad'])."',
				'".$arreglo[$i]['cantidad']."'
				)");
                $query = $con->query($sql);
                if($query!=null){
                    print "<script>alert(\"Compra exitosa.\");window.location='../Vista/carritousu.php';</script>";
                    unset($_SESSION['carrito']);
                }else{
                    print
                     "<script>alert(\"No se pudo comprar.\");window.location='../Vista/carritousu.php';</script>";
                }
			
		}
			
            

        

?>