<?php
session_start();

if(!($_SESSION['Documento']))
{
  header ("Location:../index.php");
}

include "../Modelo/Conexion2.php" ; 
// ProductoBusca

if(isset($_SESSION['carrito'])){
  if(isset($_GET['Id'])){
  $arreglo = $_SESSION['carrito'];
  $encontro = false;
  $numero = 0;
  for($i=0; $i<count($arreglo); $i++){
    if($arreglo[$i]['IdProducto'] == $_GET['Id']){
      $encontro = true;
      $numero = $i;
    }
  }
  if($encontro == true){
    $arreglo[$numero]['cantidad']=$arreglo[$numero]['cantidad']+1;
    $_SESSION['carrito'] = $arreglo;
  }else{
    $Nombre="";
    $Precio=0;
    $Imagen="";
     $sql=("SELECT * FROM producto WHERE IdProducto=".$_GET['Id']);
    $rec=$con->query($sql);
    while ($f = $rec->fetch_array()) {
      $Nombre=$f['Nombre'];
      $Precio=$f['Precio'];
      $Imagen=$f['Imagen'];
     }
     $datosnuevos = array('IdProducto'=>$_GET['Id'],
                        'nombre'=>$Nombre,
                        'precio'=>$Precio,
                        'imagne'=>$Imagen,
                        'cantidad'=>1);
    array_push($arreglo, $datosnuevos);
    $_SESSION['carrito']=$arreglo;
}
  }


}else {
  if(isset($_GET['Id'])){
    $Nombre="";
    $Precio=0;
    $Imagen="";
     $sql=("SELECT * FROM producto WHERE IdProducto=".$_GET['Id']);
    $rec=$con->query($sql);
    while ($f = $rec->fetch_array()) {
      $Nombre=$f['Nombre'];
      $Precio=$f['Precio'];
      $Imagen=$f['Imagen'];

    }
     $arreglo[] = array('IdProducto'=>$_GET['Id'],
                        'nombre'=>$Nombre,
                        'precio'=>$Precio,
                        'imagne'=>$Imagen,
                        'cantidad'=>1);
      $_SESSION['carrito'] = $arreglo;

  }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>ANKALI</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <link href="../Estilo/img/logo-negro.png" rel="icon">
  <link href="../../Estilo/img/apple-touch-icon.png" rel="apple-touch-icon">


  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <link href="../Estilo/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="../Estilo/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../Estilo/lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="../Estilo/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../Estilo/lib/animate/animate.min.css" rel="stylesheet">
  <link href="../Estilo/lib/modal-video/css/modal-video.min.css" rel="stylesheet">

  <link href="../Estilo/css/style.css" rel="stylesheet">

</head>

<body>

  <header id="header" class="header header-hide">
    <div class="container">

      <div id="logo" class="pull-left">
        
        <h1><a href="usuariousu.php" class="scrollto"><a><img src="../Estilo/img/logo-blanco.png" width="70" height="70"> </a>  ANKALI</a></h1>
        
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="usuariousu.php">Inicio</a></li>
          <li><a href="Productosusu.php">Productos</a></li>
          <li><a href="Serviciosusu.php">Servicios</a></li>
          <li><a href="Pedidousu.php">Pedidos <i class="fa fa-list-alt"></i></a></li>
          <li><a href="#contact">Contacto <i class="fa fa-address-book"></i></a></li>
          <li><a href="carritousu.php">Carrito <i class="fa fa-shopping-cart"></i></a></li>
          <li><a href="../Controlador/DestruirSesion.php">Cerrar Sesión <i class="fa fa-window-close"></i></a></li>
        </ul>
      </nav>
    </div>
  </header>

    <section id="hero4" class="wow fadeIn">
      <div class="hero-container">
          <div class="container mt-4">
            <h3>Detalle Carrito</h3>
            <hr>
            <div class="row">
                <div class="col-sm-8">
                <input type="hidden" name="Pedido" id="pedido">

                <?php
                $total = 0;
                if(isset($_SESSION['carrito'])){
                  ?>
                  
                  <table class="table table-hover">
                  <thead>
                    <tr>
                      <!-- <th>Imagen</th> -->
                      <th>Nombre</th>
                      <th>Cantidad</th>
                      <th>Precio</th>
                      <th>Acciones</th>
                  </tr>
                  </thead>
                  
                  <?php

                  
                    $datos=$_SESSION['carrito'];
                    $total = 0;
                    for ($i = 0; $i < count($datos); $i++) {
                      ?>
                        <tbody>
                            <tr class="text-center">
                              <!-- <td><img src="<?php $datos[$i]['imagen']?>"></td> -->
                                <td><?php echo $datos[$i]['nombre']?></td>
                                 <td id="cantidad"><input type="number" id="cantidad" name="cantidad" value="<?php echo $datos[$i]['cantidad'];?>"></td> 
                                <td id="precio"><?php echo $datos[$i]['precio']?></td>
                                <!-- <td><button id="btn-danger"class="btn-danger"><i class="fa fa-times"></i></button></td> -->
                                <!-- <td id="precio"><?php echo $datos[$i]['Documento']?></td> -->
                            </tr>
                        </tbody>

                    
                      <?php
                      $total=($datos[$i]['precio']*$datos[$i]['cantidad'])+$total;
                    }
                    ?>
                                        
                    </table>


                    <?php
                  

                }else {
                  echo "<center><h2>El carrito esta vacio </h2></center>";
                }
                // echo  '<center><h2>'.$total.' </h2></center>';
                if($total!=""){
                  echo '<center> <a href="../Controlador/compra.php" class="#263238 blue-grey darken-4 btn">comprar</a> </center>';
                }
                ?>
                  
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Generar compra</h3>
                        </div>
                            <label>Total a Pagar:</label>
                             <input type="number" value="<?php echo $total; ?>"readonly id="Total" class="form-control">
                            </div>
                                             <div class="card-footer">
                         <a href="Productosusu.php"><button class="btn" id="carrito">ver mas producto</button></a>
                         <a href="Insumosusu.php"><button class="btn" id="carrito">Agregar insumos</button></a>
                         <a href="Serviciosusu.php"><button class="btn" id="carrito">ver mas servicios</button></a>
                         <!-- <a href="#"><button class="btn" id="carrito">Generar compra</button></a> -->

                            </div>
                    </div>

                </div>
            </div>
        </div>
      </div>
    </section>
    <script>
        //  $('#cantidad').keyup(function(){
        //       $('#Total').val($('#cantidad').val() * $('#precio').val());
        //     });    

        //     $('#cantidad').keydown(function(){
        //         $('#Total').val($('#cantidad').val()*$('#precio').val());
        //     });


        //     $('#cantidad').keypress(function(){
        //         $('#Total').val($('#cantidad').val()*$('#precio').val());
        //     });
        //     $('#cantidad').click(function(){
        //         $('#Total').val($('#cantidad').val()*$('#precio').val());
        //     });
        //     $('#cantidad').change(function(){
        //         $('#Total').val($('#cantidad').val()*$('#precio').val());
        //     });

    </script>
  <footer class="footer">
    <div class="copyrights">
        <p>&copy; Copyrights eStartup. All rights reserved.</p>
        <div class="credits">
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>

  </footer>



  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="../Estilo/lib/jquery/jquery.min.js"></script>
  <script src="../Estilo/lib/jquery/jquery-migrate.min.js"></script>
  <script src="../Estilo/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../Estilo/lib/superfish/hoverIntent.js"></script>
  <script src="../Estilo/lib/superfish/superfish.min.js"></script>
  <script src="../Estilo/lib/easing/easing.min.js"></script>
  <script src="../Estilo/lib/modal-video/js/modal-video.js"></script>
  <script src="../Estilo/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../Estilo/lib/wow/wow.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="../Estilo/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../Estilo/js/main.js"></script>

</body>
</html>
