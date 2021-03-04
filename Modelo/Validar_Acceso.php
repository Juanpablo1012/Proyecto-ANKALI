<?php

class ValidarAcceso
{

    public function __construct()
    {}

    public function InicioSesion ($inicio)
    {
        $mensaje="";
        $Db=Db::Conectar();
        $sql = $Db->prepare('SELECT Documento,IdRol FROM usuarios
            WHERE Correo = :Correo 
            AND Contrasena = :Contrasena
            AND Estado =1');
        $sql->bindvalue ('Correo',$inicio->getCorreo());
        $sql->bindvalue ('Contrasena',$inicio->getContrasena());
        try{
            $sql->execute();
            $inicio->setExiste(0);
            if ($sql->rowCount() > 0)//determinar cuantas filas se devolvieron
            {
                $datosUsuario= $sql->fetch(); //capturar los datos de un solo usuario
                $inicio ->setDocumento($datosUsuario['Documento']);
                $inicio ->setIdRol($datosUsuario['IdRol']);
                $inicio ->setContrasena('');
                $inicio->setExiste(1);
                $mensaje = "Inicio Exitoso";
            }
        }
        catch(Exception $e)
        {
            echo $e ->getMessage();
        }
        Db::CerrarConexion($Db);
        return $inicio;
    }
}
?>