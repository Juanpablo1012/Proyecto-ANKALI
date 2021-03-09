<?php
session_start();
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
  <link href="../Estilo/css/app.css" rel="stylesheet">

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
      <h1><a href="admin.php" class="scrollto"><a href=""><img src="../Estilo/img/logo-blanco.png" width="70" height="70"> </a>  ANKALI</a></h1>
      <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
    </div>

    <nav id="nav-menu-container">
      <ul class="nav-menu">
        <li class="menu-active"><a href="admin.php">Inicio</a></li>
        <li class="menu-has-children"><a href="">Servicios</a>
          <ul>
            <li><a href="Agregar_servicio.php">Agregar servicio</a></li>
            <li><a href="Listar_Servicio.php">Listar servicios</a></li>
            <!--<li><a href="#">Drop Down 4</a></li>
            <li><a href="#">Drop Down 5</a></li>-->
          </ul>
        </li>
        <li class="menu-has-children"><a href="">Productos</a>
          <ul>
            <li><a href="Agregar_producto.php">Agregar producto</a></li>
            <li><a href="Listar_Producto.php">Listar productos</a></li>
            <!--<li><a href="#">Drop Down 4</a></li>
            <li><a href="#">Drop Down 5</a></li>-->
          </ul>
        </li>
        <li class="menu-has-children"><a href="">Pedidos</a>
          <ul>
            <li><a href="Agregar_Pedido.php">Agregar Pedido</a></li>
            <li><a href="Listar_Pedido.php">Listar Pedido</a></li>
          </ul>
        </li>
        <li><a href="Venta.php">Ventas</a></li>

        <li class="menu-has-children"><a href="">Usuarios</a>
            <ul>
              <li><a href="registroAdmin.php">Registrar usuarios</a></li>
              <li><a href="">Registrar roles</a></li>
              <li><a href="">Listar usuarios</a></li>
            </ul>
        </li>
        
        <li><a href="../Controlador/DestruirSesion.php">Cerrar Sesión <i class="fa fa-window-close"></i></a></li>
      </ul>
    </nav><!-- #nav-menu-container -->
  </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero7" class="wow fadeIn">
    <div class="hero-container">
      <h1>Bienvenido de nuevo administrador</h1>
      <!--<h2>Elegant Bootstrap Template for Startups, Apps &amp; more...</h2>-->
      <!--<img src="img/hero-img.png" alt="Hero Imgs">-->
    </div>
  </section>
  <section id="productos" class="padd-section text-center wow fadeInUp">
    <div class="container">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Visitas a la tienda</h3>
                  <a href="javascript:void(0);">Ver reporte</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">820</span>
                    <span>Visitantes a lo largo del tiempo</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fa fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Desde la semana pasada</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fa fa-square text-primary"></i> Esta semana
                  </span>

                  <span>
                    <i class="fa fa-square text-gray"></i>  La semana pasada
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Productos</h3>
                <div class="card-tools">
                  <a href="#" class=" btn-tool btn-sm">
                    <i class="fa fa-download"></i>
                  </a>
                  <a href="#" class=" btn-tool btn-sm">
                    <i class="fa fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Ventas</th>
                    <th>Ver más</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>
                      <!--<img src="dist/img/default-150x150.png"  class="img-circle img-size-32 mr-2">-->
                      Ancheta stick
                    </td>
                    <td>$55.000</td>
                    <td>
                      <small class="text-success mr-1">
                        <i class="fa fa-arrow-up"></i>
                        12%
                      </small>
                      12,000 Vendido
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fa fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <!--<img src="dist/img/default-150x150.png"  class="img-circle img-size-32 mr-2">-->
                      Portalapiz
                    </td>
                    <td>$15.000 </td>
                    <td>
                      <small class="text-warning mr-1">
                        <i class="fa fa-arrow-down"></i>
                        0.5%
                      </small>
                      123,234 Vendido
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fa fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                     <!-- <img src="dist/img/default-150x150.png"  class="img-circle img-size-32 mr-2">-->
                      Ancheta globo
                    </td>
                    <td>$25.000 </td>
                    <td>
                      <small class="text-danger mr-1">
                        <i class="fa fa-arrow-down"></i>
                        3%
                      </small>
                      198 Vendido
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fa fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Ventas</h3>
                  <a href="javascript:void(0);">Ver reporte</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">$18,230.00</span>
                    <span>Ventas a lo largo del tiempo</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fa fa-arrow-up"></i> 33.1%
                    </span>
                    <span class="text-muted">Desde el mes pasado</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fa fa-square text-primary"></i> Este año
                  </span>

                  <span>
                    <i class="fa fa-square text-gray"></i> El año pasado
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
  </div>
</section>
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

  <!-- Template Main Javascript File -->
  <script src="../Estilo/js/main.js"></script>
  <script src="../Estilo/lte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../Estilo/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="../Estilo/lte/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../Estilo/lte/plugins/chart.js/Chart.min.js"></script>
<script src="../Estilo/lte/dist/js/demo.js"></script>
<script src="../Estilo/lte/dist/js/pages/dashboard3.js"></script>


</body>
</html>
