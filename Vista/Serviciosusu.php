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
          <li><a href="Productos.html">Productos</a></li>
          <li><a href="Servicios.html">Servicios</a></li>
          <li><a href="Pedido.html">Pedidos <i class="fa fa-list-alt"></i></a></li>

          <li><a href="#contact">Contacto <i class="fa fa-address-book"></i></a></li>
          <li><a href="carrito.html">Carrito <i class="fa fa-shopping-cart"></i></a></li>
          <li><a href="../Controlador/DestruirSesion.php">Cerrar Sesión <i class="fa fa-window-close"></i></a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero" class="wow fadeIn">
    <div class="hero-container">
      <h1>Servicios</h1>
      <!--<img src="img/hero-img.png" alt="Hero Imgs">--> 
    </div>
  </section>
  <section id="servicios" class="padd-section text-center wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">
        <h2>Servicios</h2>
        <hr><hr>
      </div>
    </div>

    <div class="container">
      <div class="row">

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="../../Estilo/img/decoracion.jpg"  class="img-fluid" >
            <h4>Decoración de fiestas</h4>
            <p>Decoramos tu fiestas con la tematica que desees</p>
            <button class="btn" fontawesome=""><i class="fa fa-shopping-cart"></i> Solicitar</button>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="../../Estilo/img/regalos.JPG" alt="img" class="img-fluid">
            <h4>Marcado de regalos</h4>
            <p>Personaliza tu regalo</p>
            <button class="btn"><i class="fa fa-shopping-cart"></i> Solicitar</button>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="../../Estilo/img/Desayuno_niño.jpg" alt="img" class="img-fluid">
            <h4>Desayuno sorpresa</h4>
            <p>Personaliza tu desayuno sorpresa</p>
            <a href="Pedido.html"><button class="btn"><i class="fa fa-shopping-cart"></i> Solicitar</button></a>

          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="../../Estilo/img/Ancheta elefante.JPG" alt="img" class="img-fluid">
            <h4>Ancheta Elefante</h4>
            <p>Lorem Ipsum is simply dummy </p>
            <button class="btn " ><i class="fa fa-shopping-cart"></i> Comprar</button>

          </div>
        </div>

      </div>
    </div>
  </section>


  <!--==========================
    Contact Section
  ============================-->
  <hr><hr>
  <section id="contact" class="padd-section wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">
        <h2>Contacto</h2>
        <p class="separator">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
      </div>
    </div>

    
    <div id="contact"class="container">

      <div class="row justify-content-center">

        <div class="col-lg-3 col-md-4">

          <div class="info">
            <div>
              <i class="fa fa-map-marker"></i>
              <p>Trasversal 78A<br>Calle, 88-35</p>
            </div>

            <div class="email">
              <i class="fa fa-envelope"></i>
              <p>info@example.com</p>
            </div>

            <div>
              <i class="fa fa-phone"></i>
              <p>+57 300-871-77-49</p>
            </div>
          </div>

          <div class="social-links">
            <a href="https://www.instagram.com/regalos_ankali/?hl=es-la" class="instagram"><i class="fa fa-instagram"></i></a>
            <a href="https://wa.me/573008717749"><i class="fa fa-whatsapp"></i></a>
          </div>

        </div>

        <div class="col-lg-5 col-md-8">
          <div class="form">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <form action="" method="post" role="form" class="contactForm">
              <div class="form-group">
                <input type="text" id="login" class="fadeIn second" name="login" placeholder="Tu nombre">
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" id="login" class="fadeIn second" name="login" placeholder="Tu Correo">
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" id="login" class="fadeIn second" name="login" placeholder="Asunto">
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea type="text" id="registro" class="fadeIn second" name="login" placeholder="Descripción del mensaje"></textarea>
                <div class="validation"></div>
              </div>
              <div class="text-center"><button type="submit">Enviar mensaje</button></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  
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
