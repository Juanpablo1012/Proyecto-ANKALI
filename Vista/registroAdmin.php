<?php
require_once("../Controlador/ControladorUsuarios.php");
$listarRol = json_decode($ControladorUsuarios->ListarRoles());
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
      <h1><a href="admin.php" class="scrollto"><a href=""><img src="../Estilo/img/logo-blanco.png" width="70" height="70"> </a>  ANKALI</a></h1>
      <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
    </div>

    <nav id="nav-menu-container">
      <ul class="nav-menu">
        <li class="menu-active"><a href="admin.php">Inicio</a></li>

        <li class="menu-has-children"><a href="#">Servicios</a>
          <ul>
            <li><a href="Agregar_servicioadmin.php">Agregar servicio</a></li>
            <li><a href="Listar_Servicioadmin.php">Listar servicio</a></li>
          </ul>
        </li>
        <li class="menu-has-children"><a href="#">Productos</a>
          <ul>
            <li><a href="Agregar_productoadmin.php">Agregar producto</a></li>
            <li><a href="Listar_Productoadmin.php">Listar productos</a></li>
          </ul>
        </li>
        <li class="menu-has-children"><a href="#">Insumos</a>
          <ul>
            <li><a href="Agregar_Insumo.php">Agregar insumos</a></li>
            <li><a href="Listar_Insumo.php">Listar insumos</a></li>
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
          <h6>Registrar usuario</h6>
        </div>
        <!-- Login Form ../Controlador/ControladorUsuarios.php-->
        <form Method="POST" action="../Controlador/ControladorUsuarios.php">
        <label for=""><b>Documento:</b></label>

          <input type="number" id="Documento" class="fadeIn third documento" name="Documento" placeholder="Numero de documento" >
          
          <label for=""><b>Seleccione <br>un rol:</b></label>
          <select name="IdRol" class="pedidoP" id="IdRol">
              <option>Seleccione un Rol</option>
              <?php
                foreach($listarRol as $rol)
                {
              ?> 
                <option value="<?php echo $rol->IdRol?>"> <?php echo $rol->NombreRol?></option>
              <?php
                }
              ?>
          </select>

          <label for=""><b>Teléfono:</b></label>
          <input type="number" id="Telefono" class="fadeIn second telefono" name="Telefono" placeholder="Numero de telefono">
          <label for=""><b>Nombre:</b></label>
          <input type="text" id="Nombre" class="fadeIn third nombre" name="Nombre" placeholder="Nombre" >
          <label for=""><b>Dirección:</b></label>
          <input type="text" id="Direccion" class="fadeIn second direccion" name="Direccion" placeholder="Direccion">
          <label for=""><b>Correo:</b></label>
          <input type="email" id="Correo" class="fadeIn second correo" name="Correo" placeholder="Correo" >
          <label for=""><b>Contraseña:</b></label>
          <input type="password" id="Contrasena" class="fadeIn third contrasena" name="Contrasena" placeholder="Contraseña">
          
          <button type="submit" name="registroAdmin" class="fadeIn fourth" >Registrar</button>
          <!-- <?php print_r($_REQUEST); ?> -->
        </form>
      </div>
    </div>
      <!--<img src="img/hero-img.png" alt="Hero Imgs">-->
      
    </div>
  </section>
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!--JQUERY-->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="../Estilo/lib/jquery/jquery.min.js"></script>
  <script src="../Estilo/lib/jquery/jquery-migrate.min.js"></script>
  <!-- JavaScript Libraries -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="../Estilo/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../Estilo/lib/superfish/hoverIntent.js"></script>
  <script src="../Estilo/lib/superfish/superfish.min.js"></script>
  <script src="../Estilo/lib/easing/easing.min.js"></script>
  <script src="../Estilo/lib/modal-video/js/modal-video.js"></script>
  <script src="../Estilo/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../Estilo/lib/wow/wow.min.js"></script>
  <script src="../Estilo/contactform/contactform.js"></script>
  <script src="../Estilo/js/main.js"></script>
  <script src="../Estilo/js/alerts.js"></script>

  <script>
        //cambiar tamaño inputs c:
        let cambiar = document.querySelector(".documento").style.width="70%";
        let cambiar1 = document.querySelector(".telefono").style.width="70%";
        let cambiar2 = document.querySelector(".nombre").style.width="70%";
        let cambiar3 = document.querySelector(".direccion").style.width="70%";
        let cambiar4 = document.querySelector(".correo").style.width="70%";
        let cambiar5 = document.querySelector(".contrasena").style.width="70%";
        let cambiar6 = document.querySelector(".pedidoP").style.width="70%";

      </script>             
</body>
</html>
