<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>ANKALI</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="../../Estilo/img/logo-negro.png" rel="icon">
  <link href="../../Estilo/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="../../Estilo/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../../Estilo/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../../Estilo/lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="../../Estilo/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../Estilo/lib/animate/animate.min.css" rel="stylesheet">
  <link href="../../Estilo/lib/modal-video/css/modal-video.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../../Estilo/css/style.css" rel="stylesheet">
<!--DATATABLE-->
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
            <h1><a href="admin.html" class="scrollto"><a href=""><img src="../../Estilo/img/logo-blanco.png" width="70" height="70"> </a>  ANKALI</a></h1>
            <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
          </div>
    
          <nav id="nav-menu-container">
            <ul class="nav-menu">
              <li class="menu-active"><a href="admin.html">Inicio</a></li>
              <li class="menu-has-children"><a href="">Servicios</a>
                <ul>
                  <li><a href="Agregar_servicio.html">Agregar servicio</a></li>
                  <li><a href="Listar_Servicio.html">Listar servicios</a></li>
                  <!--<li><a href="#">Drop Down 4</a></li>
                  <li><a href="#">Drop Down 5</a></li>-->
                </ul>
              </li>
              <li class="menu-has-children"><a href="">Productos</a>
                <ul>
                  <li><a href="Agregar_producto.html">Agregar producto</a></li>
                  <li><a href="Listar_Producto.html">Listar productos</a></li>
                  <!--<li><a href="#">Drop Down 4</a></li>
                  <li><a href="#">Drop Down 5</a></li>-->
                </ul>
              </li>
              <li class="menu-has-children"><a href="Pedido.html">Pedidos</a>
                <ul>
                  <li><a href="Agregar_Pedido.html">Agregar Pedido</a></li>
                  <li><a href="Listar_Pedido.html">Listar Pedido</a></li>
                  <!--<li><a href="#">Drop Down 4</a></li>
                  <li><a href="#">Drop Down 5</a></li>-->
                </ul>
              </li>
              <li><a href="Venta.html">Ventas</a></li>
              <li><a href="Usuarios.html">Usuarios</a></li>
              
              <li><a href="../index.html"> <i class="fa fa-window-close"></i>Cerrar Sesión</a></li>
            </ul>
          </nav><!-- #nav-menu-container -->
        </div>
      </header>
  
      <section id="hero4" class="wow fadeIn">
        <div class="hero-container">
          <h1>Listado de pedidos</h1>
            <HR></HR>
          <table id="tabla" class="table table-bordered"> 
            <thead style="text-align: center;">
                <tr>
                    <th>Número de<br> pedido</th>
                    <th>Nombre del <br>cliente</th>
                    <th>Número de <br>documento</th>
                    <th>Producto</th>
                    <th>Servicio</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <td>Estado</td>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                <tr>
                    <td>01</td>
                    <td>Karen Luna</td>
                    <td>301-291-15-79</td>
                    <td>
                      <td>
                        <img src="../img/Desayuno_niño.jpg" alt="img" class="img-fluid">
                      </td>
                    <td>31/10/2020</td>
                    <td>55.000</td>
                    <td>Pendiente</td>
                    <td>
                        <a href="">Cambiar estado</a>
                        
                    </td>
                </tr>
            </tbody>
        </table>
          
        </div>
      </section>
  

  <footer class="footer">
      <div class="copyrights">
        <p>&copy; Copyrights eStartup. All rights reserved.</p>
        <div class="credits">
          Designed by <a href="">BootstrapMade</a>
        </div>
      </div>
  </footer>

  <!-- JavaScript Libraries -->
  <script src="../../Estilo/lib/jquery/jquery.min.js"></script>
  <script src="../../Estilo/lib/jquery/jquery-migrate.min.js"></script>
  <script src="../../Estilo/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../Estilo/lib/superfish/hoverIntent.js"></script>
  <script src="../../Estilo/lib/superfish/superfish.min.js"></script>
  <script src="../../Estilo/lib/easing/easing.min.js"></script>
  <script src="../../Estilo/lib/modal-video/js/modal-video.js"></script>
  <script src="../../Estilo/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../../Estilo/lib/wow/wow.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="../../Estilo/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../../Estilo/js/main.js"></script>

</body>
</html>
