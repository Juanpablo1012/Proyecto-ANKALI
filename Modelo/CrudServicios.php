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

        
        public function ListarTipoproducto()
        {
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->query('SELECT * 
            FROM `tipoproducto`'); //definir sentencia sql
            $sql->execute(); // ejecutar la consulta
            return $sql->fetchAll(); // retorna todos los registros de la consulta
            Db::CerrarConexion($Db);
        }


        public function Listarproductousu()
        {
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->query('SELECT * FROM producto WHERE Estado = 1'); //definir sentencia sql
            $sql->execute(); // ejecutar la consulta
            return $sql->fetchAll(); // retorna todos los registros de la consulta
            Db::CerrarConexion($Db);
        }


    }
?>