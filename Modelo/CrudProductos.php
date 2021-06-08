<?php
    class CrudProductos{
        public function __construct()
        {}

        public function CrearProducto($producto)
        {
            $mensaje=""; 
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->prepare('INSERT INTO producto(Nombre,Precio,Imagen,Estado,TipodeProducto)
            VALUES (:Nombre,:Precio,:Imagen,:Estado,:TipoProducto)'); //definir sentencia sql
            $sql->bindvalue('Nombre',$producto->getNombreP());
            $sql->bindvalue('Precio',$producto->getPrecio());
            $sql->bindvalue('Imagen',$producto->getImagen());
            $sql->bindvalue('Estado',$producto->getEstado());
            $sql->bindvalue('TipoProducto',$producto->getTipoProducto());
 
            try{
                $sql->execute();
                echo 
                '<script>
                    alert("Registrado correctamente.");  
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
            $sql = $Db->query('SELECT * FROM producto WHERE TipodeProducto = 1'); //definir sentencia sql
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

        public function registrardetalleInsumo($detalle)
        {
            $mensaje=""; 
            $iddetallepedido = -1; 
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->prepare('INSERT INTO dllproducto(IdProducto,IdInsumo,Cantidad,Total)
            VALUES (:IdProducto,:IdInsumo,:Cantidad,:Total)'); //definir sentencia sql
             $sql->bindvalue('IdProducto',$detalle->getIdProducto());
            $sql->bindvalue('IdInsumo',$detalle->getIdInsumo());
            $sql->bindvalue('Cantidad',$detalle->getCantidad());
            $sql->bindvalue('Total',$detalle->getTotal());
            
 
            try{
                $sql->execute();
                $iddetallepedido = $Db->lastInsertId();
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
            return $iddetallepedido;
        }

        public function Listardetalleinsu($idproducto)
        {
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->query('SELECT dllproducto.*,producto.Nombre as NombreP, insumos.Nombre as NombreI
            FROM dllproducto JOIN producto on (dllproducto.IdProducto = producto.IdProducto) 
            JOIN insumos ON (insumos.IdInsumo = dllproducto.IdInsumo) 
            WHERE dllproducto.IdProducto ='.$idproducto ); //definir sentencia sql
            $sql->execute(); // ejecutar la consulta
            return $sql->fetchAll(); // retorna todos los registros de la consulta
            Db::CerrarConexion($Db);
        }




    }
?>