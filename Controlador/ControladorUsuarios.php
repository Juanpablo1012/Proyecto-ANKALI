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

    public function Buscarusuario($Documento)
    {
        $Usuarios = new usuarios();
        $CrudUsuarios= new CrudUsuarios();
        return $CrudUsuarios->Buscarusuario($Documento);

    }

    public function Actualizarusuario($Documento,$Telefono,$Nombre,$Correo,$Contrasena,$Direccion,$Estado)
    {
        $Usuarios = new usuarios();
        $CrudUsuarios= new CrudUsuarios();
        $Usuarios->setDocumento($Documento);
        $Usuarios->setTelefono($Telefono);
        $Usuarios->setNombre($Nombre);
        $Usuarios->setCorreo($Correo);
        $Usuarios->setContrasena($Contrasena);
        $Usuarios->setDireccion($Direccion);
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
                header ("Location:../index.php");

                }
}



elseif(isset($_GET['CambiarEstado']))
{
    $Documento = $_GET['documento'];
    $ControladorUsuarios->desplegarVista('../Vista/Editarusuariousu.php?Documento='.$Documento);
}


elseif(isset($_POST['Actualizarusuario']))
{
    $ControladorUsuarios->Actualizarusuario($_POST['Documento'],$_POST['Telefono'],$_POST['Nombre'],$_POST['Correo'],$_POST['Contrasena'],$_POST['Direccion'],$_POST['Estado']);
    $ControladorUsuarios->desplegarVista('../Vista/Usuariosadmin.php');
}





?>