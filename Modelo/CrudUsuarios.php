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
                echo 
                '<script>
                    alert("Registrado correctamente.\nInicia sesión para disfrutar de nuestro sitio web");
                    window.location="../index.php";
                </script>';
            }
            catch(Exception $e)
            {
                echo 
                '<script>
                    alert("Datos incorrectos.");
                    window.history.go(-1);
                </script>';
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
            $mensaje = "";
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->prepare('UPDATE usuarios 
            SET Telefono = :Telefono,
            Nombre=:Nombre, 
            Correo= :Correo, 
            Contrasena = :Contrasena,
            Direccion = :Direccion,
            Estado = :Estado
            WHERE Documento=:Documento'); //definir sentencia sql
            $sql->bindvalue('Telefono',$Usuarios->getTelefono());
            $sql->bindvalue('Nombre',$Usuarios->getNombre());
            $sql->bindvalue('Correo',$Usuarios->getCorreo());
            $sql->bindvalue('Contrasena',$Usuarios->getContrasena());
            $sql->bindvalue('Estado',$Usuarios->getEstado());
            $sql->bindvalue('Direccion',$Usuarios->getDireccion());
            $sql->bindvalue('Documento',$Usuarios->getDocumento());

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
                echo 
                '<script>
                    alert("Usuario registrado exitosamente.");
                    window.location="../Usuariousu.php";
                </script>';
            }
            catch(Exception $e)
            {
                echo 
                '<script>
                    alert("algo ha ocurrido mal.");
                    window.history.go(-1);
                </script>';
            }
            Db::CerrarConexion($Db);
            return $mensaje;
        }

       
}
    
?>