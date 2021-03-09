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
          <li><a href="Servicios.html">Productos</a></li>
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
  <section id="hero" class="wow fadeIn">
    <div class="hero-container">
      <h1>Productos</h1>
      <!--<img src="img/hero-img.png" alt="Hero Imgs">--> 
    </div>
  </section>
  <section id="productos" class="padd-section text-center wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">
        <h2>Productos</h2>
        <hr><hr>
      </div>
    </div>

    <div class="container">
      <div class="row">

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="../../Estilo/img/portalapiz.jpeg"  class="img-fluid" >
            <h4>Portalapiz de perrito</h4>
            <p>Portalapiz de perrito, hecho a mano con foamy</p>
            <a href="carrito.html"><button class="btn"><i class="fa fa-shopping-cart"></i> Comprar</button></a>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="../../Estilo/img/ancheta globo.JPG" alt="img" class="img-fluid">
            <h4>Ancheta Globo</h4>
            <p>Ancheta ideal para relago de cumpleaños</p>
            <button class="btn"><i class="fa fa-shopping-cart"></i> Comprar</button>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="../../Estilo/img/portalapiz leon.jpeg" alt="img" class="img-fluid">
            <h4>Portalapiz de león</h4>
            <p>Portalapiz de león, hecho a mano con foamy</p>
            <button class="btn"><i class="fa fa-shopping-cart"></i> Comprar</button>

          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="../../Estilo/img/Ancheta elefante.JPG" alt="img" class="img-fluid">
            <h4>Ancheta Elefante</h4>
            <p>Ancheta con elefeante elaborado en foamy</p>
            <button class="btn"><i class="fa fa-shopping-cart"></i> Comprar</button>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="feature-block">
              <img src="../../Estilo/img/Ancheta elefante.JPG" alt="img" class="img-fluid">
              <h4>Ancheta Elefante</h4>
              <p>Lorem Ipsum is simply dummy </p>
              <button class="btn"><i class="fa fa-shopping-cart"></i> Comprar</button>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="feature-block">
              <img src="../../Estilo/img/Ancheta elefante.JPG" alt="img" class="img-fluid">
              <h4>Ancheta Elefante</h4>
              <p>Lorem Ipsum is simply dummy </p>
              <button class="btn"><i class="fa fa-shopping-cart"></i> Comprar</button>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="../../Estilo/img/Ancheta elefante.JPG" alt="img" class="img-fluid">
            <h4>Ancheta Elefante</h4>
            <p>Lorem Ipsum is simply dummy </p>
            <button class="btn"><i class="fa fa-shopping-cart"></i> Comprar</button>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="feature-block">
              <img src="../../Estilo/img/Ancheta elefante.JPG" alt="img" class="img-fluid">
              <h4>Ancheta Elefante</h4>
              <p>Lorem Ipsum is simply dummy </p>
              <button class="btn"><i class="fa fa-shopping-cart"></i> Comprar</button>
            </div>
          </div>
  
      </div>
    </div>
  </section>


  <!--==========================
    Contact Section
  ============================-->
  <hr><hr>
  
  <footer class="footer">
    

    <div class="copyrights">
      <div class="container">
        <p>&copy; Copyrights eStartup. All rights reserved.</p>
        <div class="credits">
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </div>

  </footer>



  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

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
