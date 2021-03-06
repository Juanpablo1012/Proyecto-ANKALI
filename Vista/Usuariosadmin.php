<?php
require_once("../Controlador/ControladorUsuarios.php");
$listarusuarios = json_decode($ControladorUsuarios->Listarusuarios());

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
  </header>
      <br>





      <section id="hero4" class="wow fadeIn">
      
    <div class="container mt-4">
    
        <div class="card-body" >
            <table border="1" class="table table-sriped  table-bordered" id="litarroles">
                <thead>
                <tr>
                    <th>Número de<br> documento</th>
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                    <th>Número de <br>teléfono</th>
                    <th>Roles</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach($listarusuarios as $usu)
                {
                ?> 
                <tr>
                    <td><?php echo $usu->Documento?></td>
                    <td><?php echo $usu->Nombre?></td>
                    <td><?php echo $usu->Correo?></td>
                    <td><?php echo $usu->Telefono?></td>
                    <td><?php echo $usu->NombreRol?></td>
                    <td>
                    <?php if($usu->Estado == 1 ){
                        echo "Activo";
                    } else
                    {
                        echo "Inhabiliado";
                    } ?>
                    
                    
                    </td>
                    <td>
                        <a href="../Controlador/ControladorUsuarios.php?Actualizarusuario&Documento=<?php echo $usu->Documento?>" class="btn btn" >Cambiar estado</a>
                    </td>
                    
                </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
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



    <!-- <script src="../Estilo/lib/jquery/jquery.min.js"></script> -->
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




    <script>
        $(document).ready(function () {
            $('#litarroles').DataTable({
                "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
            });
            
        });
    </script>

    
</body>

</html>