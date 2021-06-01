<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    </head>
    <body>
        
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>
<?php
    class CrudUsuarios{
        public function __construct()
        {}

        public function RegistrarUsuario($usuario)
        {
            $mensaje="";
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->prepare('INSERT INTO usuarios(Documento,Nombre,
            Telefono,Direccion,Correo,Contrasena,Estado,IdRol)
            VALUES (:Documento,:Nombre,:Telefono,:Direccion,:Correo,:Contrasena,:Estado,:IdRol)'); //definir sentencia sql
            $sql->bindvalue('Documento',$usuario->getDocumento());
            $sql->bindvalue('Nombre',$usuario->getNombre());
            $sql->bindvalue('Telefono',$usuario->getTelefono());
            $sql->bindvalue('Direccion',$usuario->getDireccion());
            $sql->bindvalue('Correo',$usuario->getCorreo());
            $sql->bindvalue('Contrasena',$usuario->getContrasena());
            $sql->bindvalue('Estado',$usuario->getEstado());
            $sql->bindvalue('IdRol',$usuario->getIdRol());

            try{
                $sql->execute();
                 echo "<script> 
                Swal.fire({
                    icon: 'success',
                    html: '<h3>Registro exitoso.</h3><br>',
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
            catch(Exception $e)
            {
                echo "<script> 
                Swal.fire({
                    icon: 'error',
                    html: '<h4>Los datos no son validos.<br>Intentalo nuevamente.</h4>',
                    allowOutsideClick: false,
                    background: '#fff',
                    confirmButtonColor: '#FC3E3E',
                    confirmButtonText: 'Cerrar'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../Vista/registro.php';
                    }
                  });
                </script>";
            }
            Db::CerrarConexion($Db);
            return $mensaje;
        }

        public function Listarusuarios()
        {
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->query('SELECT `Documento`,`Nombre`,`Telefono`,`Correo`,`Direccion`,`Estado`,`NombreRol` 
            FROM `usuarios` 
            JOIN roles on (roles.IdRol = usuarios.IdRol)'); //definir sentencia sql
            $sql->execute(); // ejecutar la consulta
            return $sql->fetchAll(); // retorna todos los registros de la consulta
            Db::CerrarConexion($Db);
        }
        
        public function ListarRoles()
        {
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->query('SELECT * 
            FROM `roles`'); //definir sentencia sql
            $sql->execute(); // ejecutar la consulta
            return $sql->fetchAll(); // retorna todos los registros de la consulta
            Db::CerrarConexion($Db);
        }

        public function Buscarusuario($Doc)
        {
            $usu = new  usuarios();
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->prepare('SELECT * FROM usuarios 
            WHERE Documento =:Documento'); //definir sentencia sql
            $sql->bindvalue('Documento',$Doc);
        
            try{
                $sql->execute();
                $registro = $sql->fetch();
                $usu->setDocumento($registro['Documento']);
                $usu->setNombre($registro['Nombre']);
                $usu->setTelefono($registro['Telefono']); 
                $usu->setCorreo($registro['Correo']); 
                $usu->setDireccion($registro['Direccion']); 
                $usu->setContrasena($registro['Contrasena']);
                $usu->setEstado($registro['Estado']);  
                $usu->setIdRol($registro['IdRol']);     
            }
                catch(Exception $e)
                {
                    echo $e->getMessage();
                }
                Db::CerrarConexion($Db);
                return $usu;
        }

        public function Actualizarusuario($Usuarios)
        {
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->prepare('UPDATE usuarios 
            SET Telefono = :Telefono,
            Nombre=:Nombre, 
            Correo= :Correo, 
            Contrasena = :Contrasena,
            Direccion = :Direccion
            WHERE Documento=:Documento'); //definir sentencia sql
            $sql->bindvalue('Telefono',$Usuarios->getTelefono());
            $sql->bindvalue('Nombre',$Usuarios->getNombre());
            $sql->bindvalue('Correo',$Usuarios->getCorreo());
            $sql->bindvalue('Contrasena',$Usuarios->getContrasena());
            $sql->bindvalue('Direccion',$Usuarios->getDireccion());
            $sql->bindvalue('Documento',$Usuarios->getDocumento());

            try{
                $sql->execute();
                echo "<script> 
                Swal.fire({
                    icon: 'success',
                    html: '<h3>Actualización exitosa </h3>',
                    allowOutsideClick: false,
                    background: '#fff',
                    confirmButtonColor: '#FC3E3E',
                    confirmButtonText: 'Cerrar'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../Vista/Usuariosadmin.php';
                    }
                  });
                </script>";
            }
            catch(Exception $e)
            {
                $mensaje = $e->getMessage();
            }
            Db::CerrarConexion($Db);
        }

        public function InicioSesion ($inicio)
        {
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
                }
            }
            catch(Exception $e)
            {
                echo $e ->getMessage();
            }
            Db::CerrarConexion($Db);
            return $inicio;
        }

        public function RestablecerContra($Usuarios)
        {
            $mensaje = "";
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->prepare('UPDATE usuarios 
            SET  Contrasena = :Contrasena
            WHERE Correo=:Correo'); //definir sentencia sql
            $sql->bindvalue('Contrasena',$Usuarios->getContrasena());
            $sql->bindvalue('Correo',$Usuarios->getCorreo());

            try{
                $sql->execute();
                $mensaje = "Actualización Exitosa";
            }
            catch(Exception $e)
            {
                $mensaje = $e->getMessage();
            }
            Db::CerrarConexion($Db);
            return $mensaje;
        }

        public function RegistrarAdmin($usuario)
        {
            $mensaje="";
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->prepare('INSERT INTO usuarios(Documento,Nombre,
            Telefono,Direccion,Correo,Contrasena,Estado,IdRol)
            VALUES (:Documento,:Nombre,:Telefono,:Direccion,:Correo,:Contrasena,:Estado,:IdRol)'); //definir sentencia sql
            $sql->bindvalue('Documento',$usuario->getDocumento());
            $sql->bindvalue('Nombre',$usuario->getNombre());
            $sql->bindvalue('Telefono',$usuario->getTelefono());
            $sql->bindvalue('Direccion',$usuario->getDireccion());
            $sql->bindvalue('Correo',$usuario->getCorreo());
            $sql->bindvalue('Contrasena',$usuario->getContrasena());
            $sql->bindvalue('Estado',$usuario->getEstado());
            $sql->bindvalue('IdRol',$usuario->getIdRol());

            try{
                $sql->execute();
                echo "<script> 
                Swal.fire({
                    icon: 'success',
                    html: '<h3>Registro exitoso.</h3><br>',
                    allowOutsideClick: false,
                    background: '#fff',
                    confirmButtonColor: '#FC3E3E',
                    confirmButtonText: 'Cerrar'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../Vista/Usuariosadmin.php';
                    }
                  });
                </script>";
            }
            catch(Exception $e)
            {
                echo "<script> 
                Swal.fire({
                    icon: 'error',
                    html: '<h4>Los datos no son validos.<br>Intentalo nuevamente.</h4>',
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
            Db::CerrarConexion($Db);
            return $mensaje;
        }

        public function CambiarEstado($id)
        {
            $mensaje = "";
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->prepare('UPDATE usuarios set Estado = !Estado WHERE Documento ='.$id); //definir sentencia sql
            try{
                $sql->execute();
                $mensaje = "Actualizacion Exitoso";
            }
            catch(Exception $e)
            {
                $mensaje = $e->getMessage();
            }
            Db::CerrarConexion($Db);
            return $mensaje;
        }


       
}
    
?>