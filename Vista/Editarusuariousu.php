<?php
require_once("../Controlador/ControladorUsuarios.php");
$doc =  $ControladorUsuarios->Buscarusuario($_GET['Documento']);
// session_start();
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
            <h1><a href="admin.html" class="scrollto"><a href=""><img src="../Estilo/img/logo-blanco.png" width="70" height="70"> </a>  ANKALI</a></h1>
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
  
  
      <section id="hero2" class="wow fadeIn">
    <div class="wrapper2 fadeInDown">
      <div id="formContent2">
        <!-- Tabs Titles -->
    
        <!-- Icon -->
        <div class="fadeIn first">
          <h6>Informacion del usuario</h6><br>
        </div>
        <!-- Login Form -->
        <form method="POST" action="../Controlador/ControladorUsuarios.php">

          <label for="">Documento </label>
          <input type="number" id="Documento" class="fadeIn third" name="Documento" value="<?php echo $doc->getDocumento() ?>" placeholder="Numero de documento"readonly>

          <label for="">Telefono</label>
          <input type="number" id="Telefono" class="fadeIn second" name="Telefono"  value="<?php echo $doc->getTelefono() ?>" placeholder="Numero de telefono">
          
          <label for="">Nombre</label>
          <input type="text" id="Nombre" class="fadeIn third" name="Nombre" value="<?php echo $doc->getNombre() ?>"  placeholder="Nombre">
          
          <label for="">Correo</label>

          <input type="email" id="Correo" class="fadeIn second" name="Correo" value="<?php echo $doc->getCorreo() ?>" placeholder="Correo" >
          
          <label for="">Direccion</label>
          <input type="text" id="Direccion" class="fadeIn second" name="Direccion" value="<?php echo $doc->getDireccion() ?>"  placeholder="Direccion">
          <label for="">Contraseña </label>
          <input type="text" id="Contrasena" class="fadeIn third" name="Contrasena" value="<?php echo $doc->getContrasena() ?>" placeholder="Contrasena">
          
          <!-- <button type="submit" name="registro" class="fadeIn fourth">Registrarse</button> -->
          <!-- <button type="submit" class="fadeIn fourth" name="Actualizarusuario" id="Actualizarusuario">Cambiar estado</button> -->
          <button class="btn btn-lg btn-primary btn-block btn-signin" name="Actualizarusuario" id="Actualizarusuario" type="submit">EDITAR USUARIO</button>

        </form>
      </div>
    </div>
      <!--<img src="img/hero-img.png" alt="Hero Imgs">-->
      
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
