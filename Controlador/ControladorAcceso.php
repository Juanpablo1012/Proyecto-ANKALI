<?php
session_start();
require_once("../Modelo/Conexion.php");
require_once("../Modelo/Usuarios.php");
require_once("../Modelo/Validar_Acceso.php");

class ControladorAcceso
{
    public function __construct()
    {}

    public function InicioSesion($Correo,$Contrasena)
    {
        $Usuarios = new usuarios();
        $validarAcceso = new ValidarAcceso();
        $Usuarios->setCorreo($Correo);
        $Usuarios->setContrasena($Contrasena);
        return $validarAcceso->InicioSesion($Usuarios);  
    }
}

$ControladorAcceso = new ControladorAcceso();

if(isset($_POST['acceder']))
{
    $Usuarios=$ControladorAcceso->InicioSesion(
        $_POST['Correo'],
        $_POST['Contrasena']);
            if($Usuarios->getExiste()==1)
                {
                    $_SESSION['Documento']=$Usuarios->getDocumento();
                    $_SESSION['IdRol']=$Usuarios->getIdRol();
                    //header ("Location:../Vista/Usuario/usuario.php");
                    echo $Usuarios->getExiste();
                }
            else
                {
                echo $Usuarios->getExiste();
                }
}

?>