<?php
    class CrudInsumos{
        public function __construct()
        {}

        public function CrearInsumo($Insumo)
        {
            $mensaje=""; 
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->prepare('INSERT INTO insumos(Nombre,Imagen,Precio,Stock,Estado)
            VALUES (:Nombre,:Imagen,:Precio,:Stock,:Estado)'); //definir sentencia sql
            $sql->bindvalue('Nombre',$Insumo->getNombre());
            $sql->bindvalue('Imagen',$Insumo->getImagen());
            $sql->bindvalue('Precio',$Insumo->getPrecio());
            $sql->bindvalue('Stock',$Insumo->getStock());
            $sql->bindvalue('Estado',$Insumo->getEstado());
 
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
                    window.location=";
                </script>';
            }
            Db::CerrarConexion($Db);
            return $mensaje;
        }

        public function ListarInsumo()
        {
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->query('SELECT * FROM insumos'); //definir sentencia sql
            $sql->execute(); // ejecutar la consulta
            return $sql->fetchAll(); // retorna todos los registros de la consulta
            Db::CerrarConexion($Db);
        }

        public function BuscarInsumo($Ins)
        {
            $Insumo = new Insumos();
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->prepare('SELECT * FROM insumos 
            WHERE IdInsumo =:IdInsumo'); //definir sentencia sql
            $sql->bindvalue('IdInsumo',$Ins);
        
            try{
                $sql->execute();
                $x = $sql->fetch();
                $Insumo->setIdinsumo($x['IdInsumo']);
                $Insumo->setNombre($x['Nombre']);    
                $Insumo->setImagen($x['Imagen']);   
                $Insumo->setPrecio($x['Precio']);  
                $Insumo->setStock($x['Stock']);    
                $Insumo->setEstado($x['Estado']);    

            }
                catch(Exception $e)
                {
                    echo $e->getMessage();
                }
                Db::CerrarConexion($Db);
                return $Insumo;
        }

        public function EditarInsumo($Insumo)
        {
            $mensaje = "";
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->prepare('UPDATE servicios 
            SET 
            Nombre=:Nombre, 
            Imagen = :Imagen,
            Precio = :Precio,
            Stock = :Stock,
            Estado = :Estado
            WHERE IdInsumo=:IdInsumo'); //definir sentencia sql
            $sql->bindvalue('Nombre',$Insumo->getNombre());
            $sql->bindvalue('Imagen',$Insumo->getImagen());
            $sql->bindvalue('Precio',$Insumo->getPrecio());
            $sql->bindvalue('Stock',$Insumo->getStock());
            $sql->bindvalue('Estado',$Insumo->getEstado());
            $sql->bindvalue('IdInsumo',$Insumo->getIdInsumo());
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

        public function ListarInsumousu()
        {
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->query('SELECT * FROM insumos WHERE Estado = 1'); //definir sentencia sql
            $sql->execute(); // ejecutar la consulta
            return $sql->fetchAll(); // retorna todos los registros de la consulta
            Db::CerrarConexion($Db);
        }

        public function CambiarEstadoInsu($id)
        {
            $mensaje = "";
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->prepare('UPDATE insumos set Estado = !Estado WHERE IdInsumo ='.$id); //definir sentencia sql
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