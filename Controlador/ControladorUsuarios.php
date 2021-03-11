<?php
session_start();
require_once("../Modelo/Conexion.php");
require_once("../Modelo/Usuarios.php");
require_once("../Modelo/CrudUsuarios.php");

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

    public function Actualizarusuario($Documento,$Telefono,$Nombre,$Correo,
    $Contrasena,$Direccion,$Estado)
    {
        $Usuarios =new usuarios();
        $CrudUsuarios= new CrudUsuarios();
        $Usuarios->setDocumento($Documento);
        $Usuarios->setNombre($Nombre);
        $Usuarios->setTelefono($Telefono);
        $Usuarios->setDireccion($Direccion);
        $Usuarios->setCorreo($Correo);
        $Usuarios->setContrasena($Contrasena);
        $Usuarios->setEstado($Estado);
        return $CrudUsuarios->Actualizarusuario($Usuarios);

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
    $_POST['Contrasena']),
    $IdRoles=$_POST['IdRol'];
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
                header ("Location:../index.php");

                }
}



elseif(isset($_GET['Actualizarusuario']))
{
    $Documento = $_GET['Documento'];
    $ControladorUsuarios->desplegarVista('../Vista/Editarusuariousu.php?Documento='.$Documento);
}


elseif(isset($_POST['Actualizarusuario']))
{
    echo $ControladorUsuarios->Actualizarusuario($_POST['Documento'],$_POST['Telefono'],$_POST['Nombre'],$_POST['Correo'],$_POST['Contrasena'],$_POST['Direccion'],$_POST['Estado']);
    $ControladorUsuarios->desplegarVista('../Vista/Usuariosadmin.php'.$Documento);
}

elseif(isset($_POST['recuperarcontra']))
{
    $email = $mysqli->real_escape_string($_POST['Correo']);
    $sql = $mysqli->query("SELECT Correo, Nombre FROM usuarios where Correo = '$email'");
    $row = $sql->fetch_array();
    $count = $sql->num_rows;
    
    if($count ==1){
        $token = uniqid();
        $act =  $mysqli->query("UPDATE usuarios SET Token = '$token' WHERE Correo = '$email'");

            $email_to = $email;
            $email_subject = "Cambio de contraseña";
            $email_from = "regalosankali@gmail.com";

            $email_message = "Hola " . $row['Nombre'] . ", haz solicita recuperar tu contraseña, ingresa al siguiente link.\n\n";
            $email_message .="http://localhost/Proyecto-ANKALI/Vista/RecuperarContrasena.php?usuario=".$row['Nombre']."&token=".$token."\n\n";


            $headers = 'From: '.$email_from."\r\n". 
            'Reply-To: '.$email_from."\r\n" . 
            'X-Mailer: PHP/' . phpversion();
            @mail($email_to,$email_subject,$email_message,$headers);

            echo"Te hemos enviado un email para cambiar contraseña";

    } else{
        echo"Este correo no esta registrado";
    }
}
?>