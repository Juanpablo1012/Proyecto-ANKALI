<?php
session_start();
$doc = $_SESSION['Documento'];
require_once("../Controlador/ControladorCompras.php");

$compra =  $ControladorCompras->BuscarCompra($_GET['IdCompra']);

if(!($_SESSION['Documento']))
{
  header ("Location:../index.php");
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

  <!-- Favicons -->
  <link href="../Estilo/img/logo-negro.png" rel="icon">
  <link href="../Estilo/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="../Estilo/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../Estilo/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../Estilo/lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="../Estilo/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../Estilo/lib/animate/animate.min.css" rel="stylesheet">
  <link href="../Estilo/lib/modal-video/css/modal-video.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../Estilo/css/style.css" rel="stylesheet">

</head>

<body>

  <header id="header" class="header header-hide">
  <div class="container">
    
    <div id="logo" class="pull-left">
      <h1><a href="admin.php" class="scrollto"><a href="#"><img src="../Estilo/img/logo-blanco.png" width="70" height="70"> </a>  ANKALI</a></h1>
    </div>

    <nav id="nav-menu-container">
      <ul class="nav-menu">
        <li class="menu-active"><a href="admin.php">Inicio</a></li>
        <li class="menu-has-children"><a href="Listar_Servicioadmin.php">Servicios</a></li>
        
        <li class="menu-has-children"><a href="#">Productos</a>
          <ul>
            <li><a href="Agregar_productoadmin.php">Agregar producto</a></li>
            <li><a href="Listar_Productoadmin.php">Listar productos</a></li>
          </ul>
        </li>
        <li class="menu-has-children"><a href="#">Pedidos</a>
          <ul>
            <li><a href="Agregar_Pedidoadmin.php">Agregar Pedido</a></li>
            <li><a href="Listar_Pedidoadmin.php">Listar Pedido</a></li>
          </ul>
        </li>
        <li><a href="Ventaadmin.php">Ventas</a></li>

        <li class="menu-has-children"><a href="#">Usuarios</a>
            <ul>
              <li><a href="registroAdmin.php">Registrar usuarios</a></li>
              <li><a href="ResgistrarRol.php">Registrar roles</a></li>
              <li><a href="Usuariosadmin.php">Listar usuarios</a></li>
            </ul>
        </li>
        <li class="menu-has-children"><a href="#">Compra</a>
            <ul>
              <li><a href="Compras.php">Ingresar compra</a></li>
              <li><a href="Listar_Compra.php">Listar compras</a></li>
            </ul>
        </li>
        <li><a href="../Controlador/DestruirSesion.php">Cerrar Sesión <i class="fa fa-window-close"></i></a></li>
      </ul>
    </nav>
  </div>
  </header>
  <?php
  date_default_timezone_set('America/Panama');
  $fechaA=date("Y-m-d H:i:s");
  ?>
  <section id="hero3" class="wow fadeIn">
    <div class="wrapper3 fadeInDown">
        <div id="formContent3">
          <!-- Tabs Titles -->
      
          <!-- Icon -->
          <div class="fadeIn first">

            <h6>Editar Compra</h6>
          </div>
          <!-- Login Form enctype="multipart/form-data" -->
          <form action="../Controlador/ControladorCompras.php" method="Post" enctype="multipart/form-data">

            <input type="hidden" id="IdCompra" class="fadeIn third" value="<?php echo $compra->getIdCompra()?>"name="IdCompra" placeholder="Codigo compra">
            <input type="hidden" id="Fecha" class="fadeIn second" value="<?php echo $compra->getFecha() ?>" name="Fecha" placeholder="Número">
            <input type="hidden" id="DocumentoUsuario" class="fadeIn second" value="<?php echo $doc?>" name="DocumentoUsuario" placeholder="Número">
            
            <input type="file" id="Factura" class="fadeIn third" value="<?php echo $compra->getFactura() ?>" name="Factura" placeholder="Factura">
            
            <input type="number" id="Total" class="fadeIn second" name="Total" value="<?php echo $compra->getTotal() ?>" placeholder="Total de la compra">

            <input type="submit" name="Editar" class="fadeIn fourth" value="Editar">

          </form>
    
      
        </div>
      </div>
  </section>


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
