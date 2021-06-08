<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <link href="../Estilo/css/style.css" rel="stylesheet">
        
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    </head>
    <body>
        
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>
<?php
//error_reporting(0);

?>
<?php
session_start();
require_once("../Modelo/Conexion.php");
require_once("../Modelo/Usuarios.php");
require_once("../Modelo/CrudUsuarios.php");
require '../Estilo/phpmailer/Exception.php';
require '../Estilo/phpmailer/PHPMailer.php';
require '../Estilo/phpmailer/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ControladorUsuarios{

    public function __construct(){}

    public function RegistrarUsuario($Documento,$Nombre,$Telefono,$Direccion,
    $Correo,$Contrasena)
    {
        $Usuarios =new usuarios();
        $CrudUsuarios= new CrudUsuarios();
        $Usuarios->setDocumento($Documento);
        $Usuarios->setNombre($Nombre);
        $Usuarios->setTelefono($Telefono);
        $Usuarios->setDireccion($Direccion);
        $Usuarios->setCorreo($Correo);
        $Usuarios->setContrasena($Contrasena);
        return $CrudUsuarios->RegistrarUsuario($Usuarios);
    }

    public function InicioSesion($Correo,$Contrasena)
    {
        $Usuarios = new usuarios();
        $CrudUsuarios= new CrudUsuarios();
        $Usuarios->setCorreo($Correo);
        $Usuarios->setContrasena($Contrasena);
        return $CrudUsuarios->InicioSesion($Usuarios);  
    }

    public function Listarusuarios()
    {
        $CrudUsuarios= new CrudUsuarios();
        return json_encode($CrudUsuarios->Listarusuarios());
    }
    public function ListarRoles()
    {
        $CrudUsuarios= new CrudUsuarios();
        return json_encode($CrudUsuarios->ListarRoles());
    }

    public function Buscarusuario($Documento)
    {
        $Usuarios = new usuarios();
        $CrudUsuarios= new CrudUsuarios();
        return $CrudUsuarios->Buscarusuario($Documento);

    }

    public function CambiarEstado($Documento)
    {
        $Usuarios = new usuarios();
        $CrudUsuarios= new CrudUsuarios();
        return $CrudUsuarios->CambiarEstado($Documento);

    }

    public function Actualizarusuario($Documento,$Telefono,$Nombre,$Correo,
    $Contrasena,$Direccion)
    {
        $Usuarios =new usuarios();
        $CrudUsuarios= new CrudUsuarios();
        $Usuarios->setDocumento($Documento);
        $Usuarios->setNombre($Nombre);
        $Usuarios->setTelefono($Telefono);
        $Usuarios->setDireccion($Direccion);
        $Usuarios->setCorreo($Correo);
        $Usuarios->setContrasena($Contrasena);
        return $CrudUsuarios->Actualizarusuario($Usuarios);

    }

    public function RestablecerContra($Contrasena)
    {
        $Usuarios = new usuarios();
        $CrudUsuarios= new CrudUsuarios();
        $Usuarios->setContrasena($Contrasena);
        return $CrudUsuarios->RestablecerContra($Usuarios);
    }

    // public function BuscarCorreo($Correo)
    // {
    //     $Usuarios = new usuarios();
    //     $CrudUsuarios= new CrudUsuarios();
    //     return $CrudUsuarios->BuscarCorreo($Correo);

    // }

    public function RegistrarAdmin($Documento,$Nombre,$Telefono,$Direccion,
    $Correo,$Contrasena,$IdRol)
    {
        $Usuarios =new usuarios();
        $CrudUsuarios= new CrudUsuarios();
        $Usuarios->setDocumento($Documento);
        $Usuarios->setNombre($Nombre);
        $Usuarios->setTelefono($Telefono);
        $Usuarios->setDireccion($Direccion);
        $Usuarios->setCorreo($Correo);
        $Usuarios->setContrasena($Contrasena);
        $Usuarios->setIdRol($IdRol);

        return $CrudUsuarios->RegistrarAdmin($Usuarios);
    }

    public function desplegarVista($vista)
    {
        header("location:".$vista);

    }

} 


$ControladorUsuarios = new ControladorUsuarios();


if(isset($_POST['registro']))
{
    $doc = $_POST['Documento'];
    $tel = $_POST['Telefono'];
    $nom = $_POST['Nombre'];
    $dir = $_POST['Direccion'];
    $correoU = $_POST['Correo'];
    $contraU = $_POST['Contrasena'];

    if (trim($doc) == null || trim($tel) == null || trim($nom) == null || trim($dir) == null || trim($correoU) == null || trim($contraU) == null){
        echo 
        "<script>
        Swal.fire({
            icon: 'warning',
            html: '<h3>Todos los campos son obligatorios.</h3>',
            allowOutsideClick: false,
            background: '#fff',
            confirmButtonColor: '#FC3E3E',
            confirmButtonText: 'Cerrar'
          }).then((result) => {
            if (result.isConfirmed) {
                window.history.back();
            }
          });
          </script>";
    }else{
            $ControladorUsuarios->RegistrarUsuario($doc,$tel,$nom,$dir,$correoU,$correoU);
    }
}

elseif(isset($_POST['acceder']))
{
        $correoU = $_POST['correoU'];
        $contraU = $_POST['contrasenaU'];
        $Usuario=$ControladorUsuarios->InicioSesion($correoU,$contraU);
        if (trim($correoU) == null || trim($contraU) == null){
            echo 
            "<script>
            Swal.fire({
                icon: 'warning',
                html: '<h3>Todos los campos son obligatorios.</h3>',
                allowOutsideClick: false,
                background: '#fff',
                confirmButtonColor: '#FC3E3E',
                confirmButtonText: 'Cerrar'
              }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../index.php';
                }
              });
              </script>";
        }else{
            if($Usuario->getExiste()==1)
            {
                $_SESSION['Documento']=$Usuario->getDocumento();
                $_SESSION['IdRol']=$Usuario->getIdRol();
                if($_SESSION['IdRol']==2){
                    echo '<script>
                    window.location="../Vista/usuariousu.php"
                    </script>';
                }else{
                    echo '<script>
                    window.location="../Vista/admin.php"
                    </script>';
                }
            }else{
                echo 
            "<script>
            Swal.fire({
                icon: 'error',
                html: '<h3>Los datos ingresados no son validos.</h3>',
                allowOutsideClick: false,
                background: '#fff',
                confirmButtonColor: '#FC3E3E',
                confirmButtonText: 'Cerrar'
              }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../index.php';
                }
              });
              </script>";
            }
        }     
}

elseif(isset($_GET['Actualizarusuario']))
{
    
    $Documento = $_GET['Documento'];
    $ControladorUsuarios->desplegarVista('../Vista/Editarusuariousu.php?Documento='.$Documento);
}

elseif(isset($_POST['Actualizarusuario']))
{
    $doc = $_POST['Documento'];
    $tel = $_POST['Telefono'];
    $nom = $_POST['Nombre'];
    $dir = $_POST['Direccion'];
    $correoU = $_POST['Correo'];
    $contraU = $_POST['Contrasena'];

    if (trim($doc) == null || trim($tel) == null || trim($nom) == null || trim($dir) == null || trim($correoU) == null || trim($contraU) == null){
        echo 
        "<script>
        Swal.fire({
            icon: 'warning',
            html: '<h3>Todos los campos son obligatorios.</h3>',
            allowOutsideClick: false,
            background: '#fff',
            confirmButtonColor: '#FC3E3E',
            confirmButtonText: 'Cerrar'
          }).then((result) => {
            if (result.isConfirmed) {
                window.history.back();
            }
          });
          </script>";
        }else{
            $ControladorUsuarios->Actualizarusuario($doc,$tel,$nom,$dir,$correoU,$correoU);
        }    
}
elseif(isset($_POST['registroAdmin']))
{
    $doc = $_POST['Documento'];
    $tel = $_POST['Telefono'];
    $nom = $_POST['Nombre'];
    $dir = $_POST['Direccion'];
    $correoU = $_POST['Correo'];
    $contraU = $_POST['Contrasena'];
    $rol = $_POST['IdRol'];
    
        if (trim($doc) == null || trim($tel) == null || trim($nom) == null || trim($dir) == null || trim($correoU) == null || trim($contraU) == null || trim($rol) == null){
            echo 
            "<script>
            Swal.fire({
                icon: 'warning',
                html: '<h3>Todos los campos son obligatorios.</h3>',
                allowOutsideClick: false,
                background: '#fff',
                confirmButtonColor: '#FC3E3E',
                confirmButtonText: 'Cerrar'
              }).then((result) => {
                if (result.isConfirmed) {
                    window.history.back();
                }
              });
              </script>";
        }else{
            $ControladorUsuarios->RegistrarAdmin($doc,$tel,$nom,$dir,$correoU,$correoU,$rol);

        }
}

elseif(isset($_GET['CambiarEstado']))
{
    $Documento = $_GET['Documento'];
     $ControladorUsuarios->CambiarEstado($Documento);
     $ControladorUsuarios->desplegarVista('../Vista/Usuariosadmin.php');

}

elseif(isset($_POST['recuperarcontra']))
{
        $body="";
        //$mysqli="";
            $email = $mysqli->real_escape_string($_POST['Correo']);
            if (trim($email) == null ){
                echo 
                "<script>
                Swal.fire({
                    icon: 'warning',
                    html: '<h3>Todos los campos son obligatorios.</h3>',
                    allowOutsideClick: false,
                    background: '#fff',
                    confirmButtonColor: '#FC3E3E',
                    confirmButtonText: 'Cerrar'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.history.back();
                    }
                  });
                  </script>";}
                  else{
                    define("KEY","ankali");
                    define("COD","AES-128-ECB");
                    $correoencript=openssl_encrypt($email,COD,KEY);
                    $xx=$email;
                    
                    $sql = $mysqli->query("SELECT Nombre, Documento FROM usuarios where Correo = '$email'");
                    
                    $row = $sql->fetch_array();
                    $count = $sql->num_rows;
                    
            if($count ==1){
                $ndocencript=openssl_encrypt($row['Documento'],COD,KEY);
    
                //$act =  $mysqli->query("UPDATE usuarios WHERE Correo = '$email'");
                $body =  '
                <center style="min-width:580px;width:100%">
                    <table style="Margin:0 auto;border-collapse:collapse;border-spacing:0;float:none;margin:0 auto;padding:0;text-align:center;vertical-align:top;width:100%">
                        <tbody>
                            <tr style="padding:0;text-align:left;vertical-align:top">
                                <td height="15px" style="Margin:0;border-collapse:collapse!important;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:10px;font-weight:400;line-height:10px;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
    
                        <table align="center" class="m_-3617184912195535673container" style="Margin:0 auto;background:#fff;border-collapse:collapse;border-spacing:0;float:none;margin:0 auto;padding:10px;text-align:center;vertical-align:top;width:580px;margin-left:10px!important;margin-right:10px!important">
                        <tbody>
                            <tr style="padding:0;text-align:left;vertical-align:top">
                                <td style="Margin:0;border-collapse:collapse!important;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
                                    <table class="m_-3617184912195535673row m_-3617184912195535673header-v2" style="background-color:#fff;background-image:none;background-position:top left;background-repeat:repeat;border-bottom:1px solid #efeef1;border-collapse:collapse;border-spacing:0;display:table;margin:10px 0 15px 0;padding:0;text-align:left;vertical-align:top;width:100%"> 
                                        <tbody>
                                            <tr style="padding:0;text-align:left;vertical-align:top">
                                                <th class="m_-3617184912195535673small-12 m_-3617184912195535673columns" style="Margin:0 auto;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-bottom:0!important;padding-left:20px;padding-right:20px;padding-top:0!important;text-align:left;width:560px">
                                                    <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                        <tbody>
                                                            <tr style="padding:0;text-align:left;vertical-align:top">
                                                                <th style="Margin:0; color:#322f37; font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left">
                                                                    <h1 style="text-align: center; font-family: cursive; ">ANKALI</h1>
                                                                    <hr style="height:3px;border:none;background:linear-gradient(274deg, #46c9d0d8, #6262e2d2 44%, #c862f7d8)">
                                                                </th>
                                                            </tbody>
                                                        </table>
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
    
                                        <table class="m_-3617184912195535673row" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;text-align:left;vertical-align:top;width:100%">
                                            <tbody>
                                                <tr style="padding:0;text-align:left;vertical-align:top">
                                                    <th class="m_-3617184912195535673small-12 m_-3617184912195535673columns" style="Margin:0 auto;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:18px;font-weight:500;line-height:1.3;margin:0 auto;padding:0;padding-bottom:0!important;padding-left:20px;padding-right:20px;padding-top:0!important;text-align:left;width:560px">
                                                        <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                            <tbody>
                                                                <tr style="padding:0;text-align:left;vertical-align:top">
                                                                    <th style="Margin:0;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:18px;font-weight:500;line-height:1.3;margin:0;padding:0;text-align:left">
                                                                        <h6 style="Margin:0;Margin-bottom:10px;color:inherit;font-family:Helvetica,Arial,sans-serif;font-size:18px;font-weight:500;line-height:1.3;margin:0;margin-bottom:0;padding:0;padding-bottom:0;text-align:center;word-wrap:normal;color:#9147ff">Hola'.' '.$row['Nombre'] .'</h6>
                                                                    </th>
                                                                    <th style="Margin:0;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0!important;text-align:left;width:0">
                                                                    </th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
    
    
    
                                        <table class="m_-3617184912195535673row" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;text-align:left;vertical-align:top;width:100%">
                                            <tbody>
                                                <tr style="padding:0;text-align:left;vertical-align:top">
                                                    <th class="m_-3617184912195535673small-12 m_-3617184912195535673columns" style="Margin:0 auto;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:300;line-height:1.3;margin:0 auto;padding:0;padding-bottom:16px;padding-left:20px;padding-right:20px;padding-top:10px;text-align:left;width:560px">
                                                        <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                            <tbody>
                                                                <tr style="padding:0;text-align:left;vertical-align:top">
                                                                    <th style="Margin:0;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:center">
                                                                        <p style="Margin:0;Margin-bottom:10px;font-family:Helvetica,Arial,Verdana,font-size:16px;font-weight:300;line-height:24px;margin:0;margin-bottom:0;padding:0;padding-bottom:0;text-align:center color:black;">¡Notamos que solicitaste restablecer tu contraseña en ANKALI! <br>Por favor haga clik en el botón para restablecer la contraseña: </p><br>
                                                                        <button style="background:linear-gradient(274deg, #46c9d0d8, #6262e2d2 44%, #c862f7d8); border: none; color: white; padding: 10px 20px; text-align: center;text-decoration: none;display: inline-block; text-transform: uppercase;font-size: 14px; "> 
                                                                            <a style="text-decoration:none;
                                                                            color:white;
                                                                            padding-top:15px;
                                                                            padding-bottom:15px;
                                                                            padding-left:60px;
                                                                            padding-right:60px; " href=" http://localhost/Proyecto-ANKALI/Vista/RestablecerContrasena.php?ABC='.$correoencript.'&ndoc='.$ndocencript.'"> Restablecer contraseña </a></button>
                                                                        <br><hr style="height:3px;border:none;background:linear-gradient(274deg, #46c9d0d8, #6262e2d2 44%, #c862f7d8)">
    
                                                                    </th>
                                                                    <th style="Margin:0;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;padding:0!important;text-align:left;width:0">
                                                                    </th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                        
    
    
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <table align="center" class="m_-3617184912195535673container" style="Margin:0 auto;background:0 0!important;border-collapse:collapse;border-spacing:0;float:none;margin:0 auto;padding:0;text-align:center;vertical-align:top;width:580px">
                                
                            <table align="center" style="background:0 0!important;border-collapse:collapse;border-spacing:0;margin:20px auto 0 auto;padding:0;text-align:inherit;vertical-align:top;width:580px">
                                <tbody>
                                            <th style="color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0">
                                                <p style="color:#322f37;font-family:Helvetica,Arial,Verdana,font-size:16px;font-weight:400;line-height:24px;margin:0;margin-top:5px;margin-bottom:10px;padding:0;padding-bottom:10px;text-align:center">
                                                    <small style="color:#706a7c;font-size:14px">© 2021 ANKALI, todos los derechos reservados</small>
                                                </p>
                                            </th>
                                            <th style="color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0!important;text-align:left;width:0"></th>
                                    </tbody>
                                </table>
                        </table>
                </center>';
            }else{
             echo "<script> 
                Swal.fire({
                    icon: 'error',
                    html: '<h3>Este correo no esta asociado a <br>ninguna cuenta.</h3>',
                    allowOutsideClick: false,
                    background: '#fff',
                    confirmButtonColor: '#FC3E3E',
                    confirmButtonText: 'Cerrar'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.history.back();
                    }
                  });
                </script>";
            }
            $mail = new PHPMailer(true);
    
        try {
            $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
            );
            
            //Server settings
            $mail ->SMTPDebug = 0;
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'regalosankali@gmail.com';                     // SMTP username
            $mail->Password   = 'Ankali123*';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
            //Recipients
            $mail->setFrom($email);
            $mail->addAddress($email);     // Add a recipient
    
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'ANKALI';
            $mail->Body = $body;
    
            $mail->send();
            echo  
            "<script>
            Swal.fire({
                icon: 'success',
                html: '<h3>Correo enviado exitosamente</h3>',
                allowOutsideClick: false,
                background: '#fff',
                confirmButtonColor: '#FC3E3E',
                confirmButtonText: 'Cerrar'
              }).then((result) => {
                if (result.isConfirmed) {
                    window.history.back();
                }
              });
              </script>";
    
        } catch (Exception $e) {
           // echo "Error en el envio: {$mail->ErrorInfo}";
        } 
                  }
                  
}

elseif(isset($_POST['restablecercontra']))
{
    define("KEY","ankali");
    define("COD","AES-128-ECB");
    
    $Correo=openssl_decrypt($_REQUEST['email'],COD,KEY);
    $Correo=($_REQUEST['email']);
    $Documento=openssl_decrypt($_REQUEST['ndoc'],COD,KEY);
    $email = $mysqli->real_escape_string($Correo);
    $psw=$_REQUEST['Contrasena'];
    
    if (trim($psw) == null ){
            echo 
            "<script>
            Swal.fire({
                icon: 'warning',
                html: '<h3>Todos los campos son obligatorios.</h3>',
                allowOutsideClick: false,
                background: '#fff',
                confirmButtonColor: '#FC3E3E',
                confirmButtonText: 'Cerrar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.history.back();
                }
            });
            </script>";
        }else{
            echo "<script>
            Swal.fire({
                icon: 'success',
                html: '<h3>Contraseña restablecida<br> correctamente.</h3>',
                allowOutsideClick: false,
                background: '#fff',
                confirmButtonColor: '#FC3E3E',
                confirmButtonText: 'Cerrar'
              }).then((result) => {
                if (result.isConfirmed) {
                    window.location='../index.php';
                }
              });
              </script>";

    $sql = $mysqli->query("UPDATE  usuarios SET Contrasena = '$psw'  where Documento = '$Documento'");
        }

   
    
}


?>