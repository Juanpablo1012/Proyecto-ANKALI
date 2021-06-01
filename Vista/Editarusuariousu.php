<?php
error_reporting(0);
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANKALI</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css" />

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>

    
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
          <h6>Información del usuario</h6>
          <br>
        </div>
        <!-- Login Form -->
        <form method="POST" action="../Controlador/ControladorUsuarios.php">

          <label for="" > <b>Documento: </b></label>
          <input type="number" id="Documento" class="fadeIn third documento" name="Documento" value="<?php echo $doc->getDocumento() ?>" placeholder="Numero de documento"readonly>

          <label for="" > <b>Teléfono: </b></label>
          <input type="number" id="Telefono" class="fadeIn second telefono" name="Telefono"  value="<?php echo $doc->getTelefono() ?>" placeholder="Numero de telefono">
          
          <label for="" > <b>Nombre: </b></label>
          <input type="text" id="Nombre" class="fadeIn third nombre" name="Nombre" value="<?php echo $doc->getNombre() ?>"  placeholder="Nombre">
          
          <label for="" > <b>Correo: </b></label>

          <input type="email" id="Correo" class="fadeIn second correo" name="Correo" value="<?php echo $doc->getCorreo() ?>" placeholder="Correo" >
          
          <label for="" > <b>Dirección: </b></label>
          <input type="text" id="Direccion" class="fadeIn second direccion" name="Direccion" value="<?php echo $doc->getDireccion() ?>"  placeholder="Direccion">
          <label for="" > <b>Contraseña: </b></label>
          <input type="text" id="Contrasena" class="fadeIn third contrasena" name="Contrasena" value="<?php echo $doc->getContrasena() ?>" placeholder="Contrasena">
          
          <button class="btn btn-lg btn-primary btn-block btn-signin" name="Actualizarusuario" id="Actualizarusuario" type="submit">Guardar</button>

        </form>
      </div>
    </div>
      <!--<img src="img/hero-img.png" alt="Hero Imgs">-->
      
    </div>
  </section>
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
  <script src="Estilo/js/alerts.js"></script>
  <script src="Estilo/js/main.js"></script>

  <script>
        //cambiar tamaño c:
        let cambiar = document.querySelector(".documento").style.width="70%";
        let cambiar1 = document.querySelector(".telefono").style.width="70%";
        let cambiar2 = document.querySelector(".nombre").style.width="70%";
        let cambiar3 = document.querySelector(".direccion").style.width="70%";
        let cambiar4 = document.querySelector(".correo").style.width="70%";
        let cambiar5 = document.querySelector(".contrasena").style.width="70%";

      </script>

</body>
</html>
