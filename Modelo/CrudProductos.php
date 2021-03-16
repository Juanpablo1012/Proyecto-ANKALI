<?php
    class CrudProductos{
        public function __construct()
        {}

        public function CrearProducto($producto)
        {
            $mensaje="";
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->prepare('INSERT INTO producto(Nombre,Precio,Stock,Estado,TipodeProducto)
            VALUES (:Nombre,:Precio,:Stock,:Estado,:TipoProducto)'); //definir sentencia sql
            $sql->bindvalue('Nombre',$producto->getNombreP());
            $sql->bindvalue('Precio',$producto->getPrecio());
            $sql->bindvalue('Stock',$producto->getStock());
            $sql->bindvalue('Estado',$producto->getEstado());
            $sql->bindvalue('TipoProducto',$producto->getTipoProducto());

            try{
                $sql->execute();
                echo 
                '<script>
                    alert("Registrado correctamente.");
                    window.location="../Vista/Agregar_productoadmin.php";                
                </script>';
            }
            catch(Exception $e)
            {
                echo 
                '<script>
                    alert("No se puede agregar");
                    window.location="../Vista/Listar_productoadmin.php";
                </script>';
            }
            Db::CerrarConexion($Db);
            return $mensaje;
        }

        public function Listarproducto()
        {
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->query('SELECT * FROM producto ORDER BY Nombre'); //definir sentencia sql
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