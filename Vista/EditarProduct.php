<?php
require_once("../Controlador/ControladorProductos.php");
$product =  $ControladorProductos->BuscarProducto($_GET['IdProducto']);
$listarTP = json_decode($ControladorProductos->ListarTipoproducto());

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

</head>

<body>

  <header id="header" class="header header-hide">
  <div class="container">
    
    <div id="logo" class="pull-left">
      <h1><a href="admin.php" class="scrollto"><a href="#"><img src="../Estilo/img/logo-blanco.png" width="70" height="70"> </a>  ANKALI</a></h1>
    </div>

    <nav id="nav-menu-container">
      <ul class="nav-menu">
        <li class="menu-active"><a href="admin.php">Inicio</a></li>
        <li class="menu-has-children"><a href="Listar_Servicioadmin.php">Servicios</a></li>
        
        <li class="menu-has-children"><a href="#">Productos</a>
          <ul>
            <li><a href="Agregar_productoadmin.php">Agregar producto</a></li>
            <li><a href="Listar_Productoadmin.php">Listar productos</a></li>
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
              <li><a href="ResgistrarRol.php">Registrar roles</a></li>
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
  
  <section id="hero3" class="wow fadeIn">
    <div class="wrapper3 fadeInDown">
        <div id="formContent3">
          <!-- Tabs Titles -->
      
          <!-- Icon -->
          <div class="fadeIn first">

            <h6>Editar Producto o insumo</h6>
          </div>
          <!-- Login Form -->
          <form action="../Controlador/ControladorProductos.php" method="Post" enctype="multipart/form-data">
          
          <select name="IdTipoProducto">
              <option>Seleccione un tipo de producto</option>
              <?php
                foreach($listarTP as $Tp)
                {
              ?> 
                <option value="<?php echo $Tp->IdTipoProducto?>"> <?php echo $Tp->Nombre?></option>
              <?php
                }
              ?>
          </select>

            <input type="number" name="IdProducto" class="fadeIn third" value="<?php echo $product->getIdProducto() ?>" placeholder="Codigo producto" readonly>

            <input type="text" name="Nombre" class="fadeIn third" value="<?php echo $product->getNombre() ?>" placeholder="Nombre" required>
            
            <input type="number" name="Precio" class="fadeIn second" value="<?php echo $product->getPrecio() ?>" placeholder="Precio" required>


            <input type="file" name="Imagen" class="fadeIn second" value="<?php echo $product->getImagen() ?>" placeholder="Imagen" required>

            <textarea type="text" name="Descripcion" class="fadeIn second" value="<?php echo $product->getDescripcion() ?>"placeholder="Descripcion"></textarea>

            <input type="number" name="Stock" class="fadeIn second" value="<?php echo $product->getStock() ?>" placeholder="Stock" required>
             
            

            <input type="submit" ID="EditarProducto"name="EditarProducto" class="fadeIn fourth">
          </form>
    
      
        </div>
      </div>
  </section>
  





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
