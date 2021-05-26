<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>ANKALI</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
        
      <h1>
        <a href="index.html" class="scrollto">
          <a href="index.html">
            <img src="../Estilo/img/logo-blanco.png" width="70" height="70">
          </a>  
            ANKALI
        </a>
      </h1>
        
      </div>
    </div>
  </header>

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero2" class="wow fadeIn">
    <div class="wrapper2 fadeInDown">
      <div id="formContent2">
        <!-- Tabs Titles -->
    
        <!-- Icon -->
        <div class="fadeIn first">
          <img src="../Estilo/img/logo-negro.png" id="icon2" alt="User Icon">
          <h6>¡Registrarte!</h6>
          <br>
        </div>
        <!-- Login Form -->
        <form Method="POST" action="../Controlador/ControladorUsuarios.php">
          <label for=""><b>Documento:</b></label>
          <input type="number" id="Documento" class="fadeIn third documento" name="Documento" placeholder="Numero de documento" required>
          
          <label for=""><b>Número de<br> teléfono:</b></label>
          <input type="number" id="Telefono" class="fadeIn second telefono" name="Telefono" placeholder="Numero de telefono">
          <br>
          <label for=""><b>Nombre:</b></label>
          <input type="text" id="Nombre" class="fadeIn third nombre" name="Nombre" placeholder="Nombre" required>

          <label for=""><b>Direccion:</b></label>
          <input type="text" id="Direccion" class="fadeIn second direccion" name="Direccion" placeholder="Direccion">

          <label for=""><b>Correo:</b></label>
          <input type="email" id="Correo" class="fadeIn second correo" name="Correo" placeholder="Correo"required>

          <label for=""><b>Contraseña:</b></label>
          <input type="password" id="Contrasena" class="fadeIn third contrasena" name="Contrasena" placeholder="Contraseña"required>
          
          <button type="submit" name="registro" class="fadeIn fourth">Registrarse</button>
        </form>
        <button type="submit" class="fadeIn fourth" value="">
            <a href="../index.php" type="button"style="color:white">Iniciar Sesión</a>
        </button>

      </div>
    </div>
      <!--<img src="img/hero-img.png" alt="Hero Imgs">-->
      
    </div>
  </section>
  <script>
        //cambiar tamaño c:
        let cambiar = document.querySelector(".documento").style.width="70%";
        let cambiar1 = document.querySelector(".telefono").style.width="70%";
        let cambiar2 = document.querySelector(".nombre").style.width="70%";
        let cambiar3 = document.querySelector(".direccion").style.width="70%";
        let cambiar4 = document.querySelector(".correo").style.width="70%";
        let cambiar5 = document.querySelector(".contrasena").style.width="70%";

      </script>
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
