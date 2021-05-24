<?php
session_start();
require_once("../Controlador/Controladorpedido.php");
$Listarproducto = $ControladorPedido->ListarTodo();
$Listarusuario = $ControladorPedido->Listarusuarios();
// $Listarservicio = $ControladorPedido->Listarservicio();

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="../Estilo/img/logo-negro.png" rel="icon">
  <link href="../Estilo/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i"
    rel="stylesheet">

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
        <h1><a href="admin.php" class="scrollto"><a href="#"><img src="../Estilo/img/logo-blanco.png" width="70"
                height="70"> </a> ANKALI</a></h1>
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

  

  <section id="hero3" class="wow fadeIn" style="border: 1px black;">
    <div class="wrapper3 fadeInDown">
      <div id="formContent3">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">

          <h6>Agregar Pedido</h6>
        </div>
        <!-- Login Form -->
        <form name="frmpedido" id="frmpedido" method="post">
          <input type="hidden" id="pedido" class="fadeIn second" name="pedido">

          <select name="usuario" id="usuario" >
            <option value="">Seleccione el usuario</option>
            <?php
                foreach($Listarusuario as $usuario)
                echo "<option value=".$usuario['Documento'].">".$usuario['Documento'].'- - - -'.$usuario['Nombre']."</option>";
            ?>
          </select>
          <select name="producto" id="producto" onchange="precio(this)" >
            <option value="">Seleccione el Producto</option>
            <?php
                foreach($Listarproducto as $prud)
                echo "<option Precio=".$prud['Precio']." value=".$prud['IdProducto'].">".$prud['IdProducto'].'- - -'.$prud['Nombre'].'- - - -'.$prud['NombreY']."</option>";
            ?>
          </select>
          <input type="text" id="Precio" class="fadeIn second" name="Precio" placeholder="Precio Producto" readonly>

          <input type="number" id="Cantidad" class="fadeIn second" name="Cantidad" placeholder="Cantidad">
          <input type="number" id="Total" class="fadeIn second" name="Total" readonly placeholder="Valor total">

          
          <input type="hidden" name="registrarpedido" id="registrarpedido">
          <!-- <button type="reset">Terminar</button> -->
          <button type="submit">Agregar</button>
        </form>

        
        

      </div>
      <div id="formContent3">
      <div id="detallepedido">
        </div>
        </div>
      

      <script>
        $(document).ready(function () {
          $('#frmpedido').submit(function (event) {
            event.preventDefault();
            console.log('usuario:' + $('#usuario').val());
            $.ajax({
              type: 'POST',
              url: '../Controlador/Controladorpedido.php',
              data: $('#frmpedido').serialize(),
              success: function (data) {
                // alert(data);
                $('#pedido').val(data);
                // document.getElementById('#usuario').innerHTML = readonly;
                
                ListarDetallepedido();
              }
            });
          });
        });

        function precio(e) {
             let _precio = $(e).find("option:selected");
             $("#Precio").val(_precio.attr("precio")); 

            
         }


        function ListarDetallepedido() {
          var formData = new FormData();
          formData.append('ListarDetallepedio', '')
          formData.append('pedido', $('#pedido').val())
          $.ajax({
            type: 'POST',
            url: '../Controlador/Controladorpedido.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
              // alert(response);
              document.getElementById('detallepedido').innerHTML = response;
            }


          });
        }

        function Eliminardetalle($iddetalle) {
          var formData = new FormData();
          formData.append('eliminardetallepedido', '');
          formData.append('IdDtllPedido', $iddetalle)
          $.ajax({
            type: 'POST',
            url: '../Controlador/Controladorpedido.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
              ListarDetallepedido();
            }
          });
        }


            $('#Cantidad').keyup(function(){
              $('#Total').val($('#Cantidad').val() * $('#Precio').val());
            });    

            $('#Cantidad').keydown(function(){
                $('#Total').val($('#Cantidad').val()*$('#Precio').val());
            });


            $('#Cantidad').keypress(function(){
                $('#Total').val($('#Cantidad').val()*$('#Precio').val());
            });
            $('#Cantidad').click(function(){
                $('#Total').val($('#Cantidad').val()*$('#Precio').val());
            });
            $('#Cantidad').change(function(){
                $('#Total').val($('#Cantidad').val()*$('#Precio').val());
            });
      </script>
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