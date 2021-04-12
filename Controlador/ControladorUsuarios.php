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

    public function BuscarCorreo($Correo)
    {
        $Usuarios = new usuarios();
        $CrudUsuarios= new CrudUsuarios();
        return $CrudUsuarios->BuscarCorreo($Correo);

    }

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

if(isset($_POST['registro'])){
    echo $ControladorUsuarios->RegistrarUsuario(
    $_POST['Documento'],
    $_POST['Nombre'],
    $_POST['Telefono'],
    $_POST['Direccion'],
    $_POST['Correo'],
    $_POST['Contrasena']);
    }

elseif(isset($_POST['acceder']))
{
    $Usuario=$ControladorUsuarios->InicioSesion(
        $_POST['Correo'],
        $_POST['Contrasena']);
            if($Usuario->getExiste()==1)
                {
                    $_SESSION['Documento']=$Usuario->getDocumento();
                    $_SESSION['IdRol']=$Usuario->getIdRol();
                    if($_SESSION['IdRol']==2){
                        header ("Location:../Vista/usuariousu.php");
                    }else{
                        header ("Location:../Vista/admin.php");
                    }
                    echo $Usuario->getExiste();
                }
            else{
                echo '
                    <script>
                        alert("Usuario o contraseña incorrecta.\nIntentalo nuevamente");
                        window.history.go(-1);
                    </script>';
                }
}

elseif(isset($_GET['Actualizarusuario']))
{
    $Documento = $_GET['Documento'];
    $ControladorUsuarios->desplegarVista('../Vista/Editarusuariousu.php?Documento='.$Documento);
}

elseif(isset($_POST['Actualizarusuario']))
{
    echo $ControladorUsuarios->Actualizarusuario($_POST['Documento'],$_POST['Telefono'],$_POST['Nombre'],$_POST['Correo'],$_POST['Contrasena'],$_POST['Direccion']);
    $ControladorUsuarios->desplegarVista('../Vista/Usuariosadmin.php'.$Documento);
}

elseif(isset($_POST['recuperarcontra']))
{
        $body="";
            $email = $mysqli->real_escape_string($_POST['Correo']);
                define("KEY","ankali");
                define("COD","AES-128-ECB");
                $correoencript=openssl_encrypt($email,COD,KEY);
                //$xx=$email;
                
                $sql = $mysqli->query("SELECT Nombre, Documento FROM usuarios where Correo = '$email'");
                
                $row = $sql->fetch_array();
                $count = $sql->num_rows;
                
        if($count ==1){
            $ndocencript=openssl_encrypt($row['Documento'],COD,KEY);

            //$act =  $mysqli->query("UPDATE usuarios WHERE Correo = '$email'");
            $body =  "<br> Estimad@ " .$row['Nombre'] . "<br> Haz solicitado recuperar tu contraseña, ingresa al siguiente link.
            http://localhost/Proyecto-ANKALI/Vista/RestablecerContrasena.php?ABC=".$correoencript."&ndoc=".$ndocencript; 
        }else{
            echo '<script>
            alert("Este correo no existe");
            window.history.go(-1);
            </script>';
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
        echo '<script>
        alert("El mensaje se envío correctamente");
        window.history.go(-1);
        </script>';

    } catch (Exception $e) {
        echo "Error en el envio: {$mail->ErrorInfo}";
    }   
}


elseif(isset($_POST['restablecercontra']))
{
    define("KEY","ankali");
    define("COD","AES-128-ECB");
    
    $Correo=openssl_decrypt($_REQUEST['email'],COD,KEY);
    $Correo=($_REQUEST['email']);

    $Documento=openssl_decrypt($_REQUEST['ndoc'],COD,KEY);


    //$Correo = $_POST['email'];
    $email = $mysqli->real_escape_string($Correo);
    $psw=$_REQUEST['Contrasena'];

    //echo "<br>"."HOLA".$Documento;

    echo '<script>
        alert("Contraseña cambiada correctamente.");
        window.location="../index.php";
        </script>';

    $sql = $mysqli->query("UPDATE  usuarios SET Contrasena = '$psw'  where Documento = '$Documento'");
    
}
elseif(isset($_POST['registroAdmin']))
{
    echo $ControladorUsuarios->RegistrarAdmin(
    $_POST['Documento'],
    $_POST['Nombre'],
    $_POST['Telefono'],
    $_POST['Direccion'],
    $_POST['Correo'],
    $_POST['Contrasena'],
    $_POST['IdRol']);
}

elseif(isset($_GET['CambiarEstado']))
{
    $Documento = $_GET['Documento'];
     $ControladorUsuarios->CambiarEstado($Documento);
     $ControladorUsuarios->desplegarVista('../Vista/Usuariosadmin.php');

}

?>