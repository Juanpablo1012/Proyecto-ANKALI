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

  <!-- =======================================================
    Theme Name: eStartup
    Theme URL: https://bootstrapmade.com/estartup-bootstrap-landing-page-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <header id="header" class="header header-hide">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="admin.html" class="scrollto"><a href=""><img src="../Estilo/img/logo-blanco.png" width="70" height="70"> </a>  ANKALI</a></h1>
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="admin.html">Inicio</a></li>
          <li class="menu-has-children"><a href="#" disabled >Servicios</a>
            <ul>
              <li><a href="Agregar_servicio.html">Agregar servicio</a></li>
              <li><a href="Listar_Servicio.html">Listar servicios</a></li>
              <!--<li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>-->
            </ul>
          </li>
          <li class="menu-has-children"><a href="Listar_Producto.html">Productos</a>
            <ul>
              <li><a href="Agregar_producto.html">Agregar producto</a></li>
              <li><a href="Listar_Producto.html">Listar productos</a></li>
              <!--<li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>-->
            </ul>
          </li>
          <li class="menu-has-children"><a href="Listar_Pedido.html">Pedido</a>
            <ul>
              <li><a href="Agregar_Pedido.html"><a href="Agregar_Pedido.html">Agregar Pedido</a></li>
              <li><a href="Listar_Pedido.html">Listar Pedido</a></li>
              <!--<li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>-->
            </ul>
          </li>          <li><a href="Venta.html">Ventas</a></li>
          <li><a href="Usuarios.html">Usuarios</a></li>
          
          <li><a href="../index.html"> Cerrar Sesión <i class="fa fa-window-close"></i></a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header>
  
  <section id="hero3" class="wow fadeIn">
    <div class="wrapper3 fadeInDown">
        <div id="formContent3">
          <!-- Tabs Titles -->
      
          <!-- Icon -->
          <div class="fadeIn first">

            <h6>Agregar Producto o Insumo</h6>
          </div>
          <!-- Login Form -->
          <form>
            <input type="hidden" id="registro" class="fadeIn third" name="login" placeholder="Codigo producto">
            <select class="fadeIn third" aria-label="Default select example">
              <option selected>--Seleccione--</option>
              <option value="1">Producto</option>
              <option value="2">Insumo</option>
            </select>
            <input type="text" id="registro" class="fadeIn third" name="login" placeholder="Nombre">
            <input type="number" id="registro" class="fadeIn second" name="login" placeholder="Cantidad">
            <input type="number" id="registro" class="fadeIn second" name="login" placeholder="Precio">
            <input type="text" id="registro" class="fadeIn second" name="login" placeholder="Proveedor">
            <textarea type="text" id="registro" class="fadeIn second" name="login" placeholder="Descripcion"></textarea>
            <input type="file" id="registro" class="fadeIn second" name="login" placeholder="Correo">
            <input type="submit" class="fadeIn fourth" value="Agregar">
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