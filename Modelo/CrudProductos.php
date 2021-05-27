<?php
    class CrudProductos{
        public function __construct()
        {}

        public function CrearProducto($producto)
        {
            $mensaje=""; 
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->prepare('INSERT INTO producto(Nombre,Precio,Imagen,Descripcion,Stock,Estado,TipodeProducto)
            VALUES (:Nombre,:Precio,:Imagen,:Descripcion,:Stock,:Estado,:TipoProducto)'); //definir sentencia sql
            $sql->bindvalue('Nombre',$producto->getNombreP());
            $sql->bindvalue('Precio',$producto->getPrecio());
            $sql->bindvalue('Imagen',$producto->getImagen());
            $sql->bindvalue('Descripcion',$producto->getDescripcion());
            $sql->bindvalue('Stock',$producto->getStock());
            $sql->bindvalue('Estado',$producto->getEstado());
            $sql->bindvalue('TipoProducto',$producto->getTipoProducto());
 
            try{
                $sql->execute();
                echo 
                '<script>
                    alert("Registrado correctamente.");
                    window.location="../Vista/Listar_productoadmin.php";                
                </script>';
            }
            catch(Exception $e)
            {
                echo 
                '<script>
                    alert("No se puede agregar");
                    window.location="../Vista/Agregar_productoadmin.php";
                </script>';
            }
            Db::CerrarConexion($Db);
            return $mensaje;
        }

        public function ListarTodo()
        {
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->query('SELECT producto.*,tipoproducto.Nombre as NombreY FROM producto 
            JOIN tipoproducto on (producto.TipodeProducto = tipoproducto.IdTipoProducto)
            WHERE producto.Estado = 1
            ORDER BY TipodeProducto ASC  '); //definir sentencia sql
            $sql->execute(); // ejecutar la consulta
            return $sql->fetchAll(); // retorna todos los registros de la consulta
            Db::CerrarConexion($Db);
        }
        
        public function Listarproducto()
        {
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->query('SELECT producto.*,tipoproducto.Nombre as nombreTP FROM producto 
                                JOIN tipoproducto on (producto.TipodeProducto = tipoproducto.IdTipoProducto)
                                WHERE TipodeProducto != 3'); //definir sentencia sql
            $sql->execute(); // ejecutar la consulta
            return $sql->fetchAll(); // retorna todos los registros de la consulta
            Db::CerrarConexion($Db);
        }

        public function ListarServicio()
        {
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->query('SELECT * FROM producto WHERE TipodeProducto = 3 '); //definir sentencia sql
            $sql->execute(); // ejecutar la consulta
            return $sql->fetchAll(); // retorna todos los registros de la consulta
            Db::CerrarConexion($Db);
        }

        public function consultarprecioP($idproducto)
        {
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->query("SELECT * FROM producto WHERE IdProducto = $idproducto "); //definir sentencia sql
            $sql->execute(); // ejecutar la consulta
            return $sql->fetch(); // retorna todos los registros de la consulta
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
            $sql = $Db->query('SELECT * FROM producto WHERE Estado = 1 AND TipodeProducto = 1'); //definir sentencia sql
            $sql->execute(); // ejecutar la consulta
            return $sql->fetchAll(); // retorna todos los registros de la consulta
            Db::CerrarConexion($Db);
        }

        public function Listarinsumousu()
        {
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->query('SELECT * FROM producto WHERE Estado = 1 AND TipodeProducto = 2'); //definir sentencia sql
            $sql->execute(); // ejecutar la consulta
            return $sql->fetchAll(); // retorna todos los registros de la consulta
            Db::CerrarConexion($Db);
        }


        public function Listarserviciosusu()
        {
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->query('SELECT * FROM producto WHERE Estado = 1 AND TipodeProducto = 3'); //definir sentencia sql
            $sql->execute(); // ejecutar la consulta
            return $sql->fetchAll(); // retorna todos los registros de la consulta
            Db::CerrarConexion($Db);
        }

        public function ProductoBusca($id)
        {
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->query('SELECT * FROM producto WHERE IdProducto ='.$id); //definir sentencia sql
            $sql->execute(); // ejecutar la consulta
            return $sql->fetchAll(); // retorna todos los registros de la consulta
            Db::CerrarConexion($Db);
        }

        

        public function CambiarEstadoP($id)
        {
            $mensaje = "";
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->prepare('UPDATE producto set Estado = !Estado WHERE IdProducto ='.$id); //definir sentencia sql
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
        public function BuscarProducto($product)
        {
            $producto = new  Productos();
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->prepare('SELECT * FROM producto 
            WHERE IdProducto =:IdProducto'); //definir sentencia sql
            $sql->bindvalue('IdProducto',$product);
        
            try{
                $sql->execute();
                $x = $sql->fetch();
                $producto->setIdProducto($x['IdProducto']);
                $producto->setNombre($x['Nombre']);    
                $producto->setPrecio($x['Precio']);    
                $producto->setImagen($x['Imagen']);    
                $producto->setStock($x['Stock']);    
                $producto->setEstado($x['Estado']);    
                //$producto->setTipoProducto($x['TipoProducto']);    

            }
                catch(Exception $e)
                {
                    echo $e->getMessage();
                }
                Db::CerrarConexion($Db);
                return $producto;
        }


    }
?>