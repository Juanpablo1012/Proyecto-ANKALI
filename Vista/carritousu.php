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
        
        <h1><a href="../usuario.html" class="scrollto"><a><img src="../Estilo/img/logo-blanco.png" width="70" height="70"> </a>  ANKALI</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="usuario.html">Inicio</a></li>
          <li><a href="Productos.html">Productos</a></li>
          <li><a href="Servicios.html">Servicios</a></li>
          <li><a href="Pedido.html">Pedidos <i class="fa fa-list-alt"></i></a></li>

          <li><a href="#contact">Contacto <i class="fa fa-address-book"></i></a></li>
          <li><a href="carrito.html">Carrito <i class="fa fa-shopping-cart"></i></a></li>
          <li><a href="../index.html">Cerrar Sesión <i class="fa fa-window-close"></i></a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
    <section id="hero4" class="wow fadeIn">
      <div class="hero-container">
          <div class="container mt-4">
            <h3>Detalle Carrito</h3>
            <hr>
            <div class="row">
                <div class="col-sm-8">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Imagen</th>

                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                              <td>
                                <img src="../Estilo/img/portalapiz.jpeg" alt="img" class="img-fluid">
                            </td>
                                <td>Portalapiz de perrito</td>
                                 <td><i class="fa fa-minus"></i>  1  <i class="fa fa-plus"></i></td> 
                                <td>15.000</td>
                                <td>Portalapiz hecho a mano de foamy</td>
                                <td><button id="btn-danger"class="btn-danger"><i class="fa fa-times"></i></button></td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Generar compra</h3>
                        </div>
                         <div class="card-body">
                             <label>Subtotal:</label>
                             <input type="text"  readonly="" class="form-control">
                                <label>Descuento:</label>
                             <input type="text" readonly="" class="form-control">
                                <label>Total a Pagar:</label>
                             <input type="text" readonly="" class="form-control">
                            </div>
                                             <div class="card-footer">
                         <button class="btn" id="carrito">Realizar Pago</button>
                         <button class="btn" id="carrito">Generar Compra</button>
                         <a href="usuario.html"><button class="btn" id="carrito">Seguir Comprando</button></a>

                            </div>
                    </div>

                </div>
            </div>
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

</body>
</html>
