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
          <li class="menu-active"><a href="usuariousu.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
              <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
            </svg> Inicio
          </a></li>
          <li><a href="Productosusu.php">Productos</a></li>
          <li><a href="Serviciosusu.php">Servicios</a></li>
          <li><a href="Pedidousu.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
              <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
              <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
            </svg> Mis pedidos 
            </a></li>
          <li><a href="carritousu.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>Carrito</a>
          </li>
          
           <li><a href="../Estilo/ManualUsuarios/Manual-ANKALI.docx">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
              <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
            </svg> Ayuda 
            </a></li>
          <li><a href="../Controlador/DestruirSesion.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
              <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg> Cerrar Sesión 
            </a></li>
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
                                <td><button id="btn-danger"class="btn-danger"><i class="fa fa-times"></i></button></td>
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
                  echo '<br><center> <a href="../Controlador/compra.php" class=" blue-grey darken-4 btn" style="background:#D3FBDD; color:#000;">comprar</a> </center>';
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
                         <a href="Productosusu.php" id="carrito" class="btn" style="background:#E7DBFF; color:#000;">Agregar más<br> producto</a>
                         <!--<a href="Insumosusu.php"><button class="btn" id="carrito" >Agregar insumos</button></a>-->
                         <a href="Serviciosusu.php"class="btn" id="carrito" style="background:#F6F4D8; color:#000;">Agregar más<br> servicios</a>
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
