<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>ANKALI</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
<!--SWEETALERT-->
<link href="Estilo/sweetalert2/sweetalert2.css" >
<link href="Estilo/sweetalert2/sweetalert2.min.css" >

  <!-- Favicons -->
  <link href="Estilo/img/logo-negro.png" rel="icon">
  <link href="Estilo/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="Estilo/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="Estilo/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="Estilo/lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="Estilo/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="Estilo/lib/animate/animate.min.css" rel="stylesheet">
  <link href="Estilo/lib/modal-video/css/modal-video.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="Estilo/css/style.css" rel="stylesheet">
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
        
      <h1>
        <a href="index.html" class="scrollto">
          <a href="index.html">
            <img src="Estilo/img/logo-blanco.png" width="70" height="70">
          </a>  
            ANKALI
        </a>
      </h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        
      </div>

    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero2" class="wow fadeIn">
    
    <div class="wrapper fadeInDown">
      <div id="formContent">
        <!-- Tabs Titles -->
    
        <!-- Icon -->
        <div class="fadeIn first">
          
          <img src="Estilo/img/logo-negro.png" id="icon" alt="User Icon">
          <h6>Inicia Sesión</h6>
          <br>
        </div>
    
        <!-- Login Form -->
        <!--<form method="POST" name="enviar" action="Controlador/ControladorUsuarios.php" id="formlogin">-->
        <form method="POST" name="enviar" action="Controlador/ControladorUsuarios.php" id="formlogin">

        <label for="" > <b>Correo: </b></label>

          <input type="text" id="login" class="fadeIn second Correo"  name="correoU" placeholder="Correo">
          <span id="validar_nombre" style="color:red"></span>
          <br>
          <label for="" > <b>Contraseña: </b></label>

          <input type="password" id="password" class="fadeIn third Pass" name="contrasenaU" placeholder="Contraseña">
          <span id="validar" style="color:red"></span>
          <br>

          <button type="submit" name="acceder"class="fadeIn fourth save" xx="1" id="inicio">Iniciar Sesión</button>

        </form>

        <button type="submit" class="fadeIn fourth" ><a href="Vista/registro.php" style="color:white">
          Registrarse</a>
        </button>
        <!-- Remind Passowrd -->
        <div id="formFooter">
          <a class="underlineHover" href="Vista/RecuperarContrasena.php">¿Olvidaste tu contraseña?</a>
        </div>
    
      </div>
    </div>
      
    </div>
    <script>
        //cambiar tamaño c:
        let cambiar = document.querySelector(".Correo").style.width="80%";
        let cambiar1 = document.querySelector(".Pass").style.width="70%";
      </script>
  </section>
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- JavaScript Libraries -->    


<!--<script src="Estilo/js/formulario.js"></script>-->
  <script src="Estilo/lib/jquery/jquery.min.js"></script>
  <script src="Estilo/lib/jquery/jquery-migrate.min.js"></script>

  <!---------------------------------------------------------------------------------------->

  <script src="Estilo/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="Estilo/lib/superfish/hoverIntent.js"></script>
  <script src="Estilo/lib/superfish/superfish.min.js"></script>
  <script src="Estilo/lib/easing/easing.min.js"></script>
  <script src="Estilo/lib/modal-video/js/modal-video.js"></script>
  <script src="Estilo/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="Estilo/lib/wow/wow.min.js"></script>
  <script src="Estilo/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="Estilo/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="Estilo/js/main.js"></script>
</body>
</html>
