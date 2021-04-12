<?php
    class CrudServicios{
        public function __construct()
        {}

        public function CrearServicio($servicio)
        {
            $mensaje=""; 
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->prepare('INSERT INTO servicios(Nombre,Descripcion,Imagen,Precio,Estado)
            VALUES (:Nombre,:Descripcion,:Imagen,:Precio,:Estado)'); //definir sentencia sql
            $sql->bindvalue('Nombre',$servicio->getNombre());
            $sql->bindvalue('Descripcion',$servicio->getDescripcion());
            $sql->bindvalue('Imagen',$servicio->getImagen());
            $sql->bindvalue('Precio',$servicio->getPrecio());
            $sql->bindvalue('Estado',$servicio->getEstado());
 
            try{
                $sql->execute();
                echo 
                '<script>
                    alert("Servicio registrado correctamente.");
                    window.location="../Vista/Listar_Servicioadmin.php";                
                </script>';
            }
            catch(Exception $e)
            {
                echo 
                '<script>
                    alert("No se puede agregar");
                    window.location="../Vista/Agregar_servicioadmin.php";
                </script>';
            }
            Db::CerrarConexion($Db);
            return $mensaje;
        }

        public function Listarservicio()
        {
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->query('SELECT * FROM servicios'); //definir sentencia sql
            $sql->execute(); // ejecutar la consulta
            return $sql->fetchAll(); // retorna todos los registros de la consulta
            Db::CerrarConexion($Db);
        }

        public function Buscarservicio($serv)
        {
            $servicio = new  Servicios();
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->prepare('SELECT * FROM servicios 
            WHERE IdServicios =:IdServicios'); //definir sentencia sql
            $sql->bindvalue('IdServicios',$serv);
        
            try{
                $sql->execute();
                $x = $sql->fetch();
                $servicio->setIdServicios($x['IdServicios']);
                $servicio->setNombre($x['Nombre']);    
                $servicio->setDescripcion($x['Descripcion']);    
                $servicio->setImagen($x['Imagen']);    
                $servicio->setPrecio($x['Precio']);    
                $servicio->setEstado($x['Estado']);    

            }
                catch(Exception $e)
                {
                    echo $e->getMessage();
                }
                Db::CerrarConexion($Db);
                return $servicio;
        }

        public function Editarservicio($servicio)
        {
            $mensaje = "";
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->prepare('UPDATE servicios 
            SET 
            Nombre=:Nombre, 
            Descripcion= :Descripcion, 
            Imagen = :Imagen,
            Precio = :Precio,
            Estado = :Estado
            WHERE IdServicios=:IdServicios'); //definir sentencia sql
            $sql->bindvalue('Nombre',$servicio->getNombre());
            $sql->bindvalue('Descripcion',$servicio->getDescripcion());
            $sql->bindvalue('Imagen',$servicio->getImagen());
            $sql->bindvalue('Precio',$servicio->getPrecio());
            $sql->bindvalue('Estado',$servicio->getEstado());
            $sql->bindvalue('IdServicios',$servicio->getIdServicios());
            try{
                $sql->execute();
                echo 
                '<script>
                    alert("Servicio registrado correctamente.");
                    window.location="../Vista/Listar_Servicioadmin.php";                
                </script>';
            }
            catch(Exception $e)
            {
                echo 
                '<script>
                    alert("No se puede agregar");
                    window.location="../Vista/Agregar_servicioadmin.php";
                </script>';
            }
            Db::CerrarConexion($Db);
            return $mensaje;
        }

        public function Listarserviciousu()
        {
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->query('SELECT * FROM servicios WHERE Estado = 1'); //definir sentencia sql
            $sql->execute(); // ejecutar la consulta
            return $sql->fetchAll(); // retorna todos los registros de la consulta
            Db::CerrarConexion($Db);
        }

        public function CambiarEstadoS($id)
        {
            $mensaje = "";
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->prepare('UPDATE servicios set Estado = !Estado WHERE IdServicios ='.$id); //definir sentencia sql
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