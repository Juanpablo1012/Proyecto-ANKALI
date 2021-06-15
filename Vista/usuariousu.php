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
        
        <h1><a href="../../usuariousu.php" class="scrollto"><a><img src="../Estilo/img/logo-blanco.png" width="70" height="70"> </a>  ANKALI</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        
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
          <li><a href="#contact">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
              <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
            </svg> Contacto 
            </a></li>
          <li><a href="carritousu.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>Carrito</a>
          </li>
          
           <li><a href="../Estilo/ManualUsuarios/Manual-ANKALI.pdf" target="_blank">
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
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero" class="wow fadeIn">
    <div class="hero-container">
      <h1>BIENVENIDO A ANKALI</h1>
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
            <img src="../Estilo/img/portalapiz.jpeg"  class="img-fluid" >
            <h4>Portalapiz de perrito</h4>
            <p>Portalapiz de perrito, hecho a mano con foamy</p>
            
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="../Estilo/img/ancheta globo.JPG" alt="img" class="img-fluid">
            <h4>Ancheta Globo</h4>
            <p>Ancheta ideal para relago de cumpleaños</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="../Estilo/img/portalapiz leon.jpeg" alt="img" class="img-fluid">
            <h4>Portalapiz de león</h4>
            <p>Portalapiz de león, hecho a mano con foamy</p>

          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="../Estilo/img/Ancheta elefante.JPG" alt="img" class="img-fluid">
            <h4>Ancheta Elefante</h4>
            <p>Ancheta con elefeante elaborado en foamy</p>

          </div>
        </div>
      </div>
    </div>
    <a href="Productosusu.php" style="text-align: center;">Ver más...</a>

  </section>
  <hr>
  <hr>

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
            <img src="../Estilo/img/decoracion.jpg"  class="img-fluid" >
            <h4>Decoración de fiestas</h4>
            <p>Decoramos tu fiestas con la tematica que desees</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="../Estilo/img/regalos.JPG" alt="img" class="img-fluid">
            <h4>Marcado de regalos</h4>
            <p>Personaliza tu regalo</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="../Estilo/img/Desayuno_niño.jpg" alt="img" class="img-fluid">
            <h4>Desayuno sorpresa</h4>
            <p>Personaliza tu desayuno sorpresa</p>

          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="../Estilo/img/Ancheta elefante.JPG" alt="img" class="img-fluid">
            <h4>Ancheta Elefante</h4>
            <p>Lorem Ipsum is simply dummy </p>
          </div>
        </div>
        

      </div>
    </div>
    <a href="Serviciosusu.php" style="text-align: center;">Ver más...</a>
  </section>

  <hr>
<hr>


  <!--==========================
    Contact Section
  ============================-->
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




  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
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
