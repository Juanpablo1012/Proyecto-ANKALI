<?php
    class CrudPedido{
        public function __construct()
        {}

        public function CrearPedido($Pedido)
        {
            $mensaje=""; 
            $Db = Db::Conectar(); // conectar bd
            $idpedido = -1;
            $sql = $Db->prepare('INSERT INTO pedido(Documento,Fecha,Estado)
            VALUES (:Documento,NOW(),:Estado)'); //definir sentencia sql
            $sql->bindvalue('Documento',$Pedido->getDocumento());
            $sql->bindvalue('Estado',$Pedido->getEstado());
 
            try{
                $sql->execute();
                $idpedido = $Db->lastInsertId();
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
            return $idpedido;
        }

        public function registrardetallepedido($detalle)
        {
            $mensaje=""; 
            $iddetallepedido = -1; 
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->prepare('INSERT INTO dllpedido(IdPedido,IdProducto,Total,Cantidad)
            VALUES (:IdPedido,:Idproducto,:Total,:Cantidad)'); //definir sentencia sql
             $sql->bindvalue('IdPedido',$detalle->getIdPedido());
            $sql->bindvalue('Idproducto',$detalle->getIdproducto());
            $sql->bindvalue('Total',$detalle->getTotal());
            $sql->bindvalue('Cantidad',$detalle->getCantidad());
 
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


        public function Listarpedido()
        {
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->query('SELECT pedido.*,usuarios.Nombre as nombreCl FROM pedido 
                                JOIN usuarios on (pedido.Documento = usuarios.Documento)'); //definir sentencia sql
            $sql->execute(); // ejecutar la consulta
            return $sql->fetchAll(); // retorna todos los registros de la consulta
            Db::CerrarConexion($Db);
        }

        public function Listarpedidopago()
        {
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->query('SELECT pedido.*,usuarios.Nombre as nombreCl FROM pedido 
                                JOIN usuarios on (pedido.Documento = usuarios.Documento)
                                WHERE pedido.Estado = 0'); //definir sentencia sql
            $sql->execute(); // ejecutar la consulta
            return $sql->fetchAll(); // retorna todos los registros de la consulta
            Db::CerrarConexion($Db);
        }

        public function Listarpedidousuario($document)
        {
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->query('SELECT usuarios.Nombre as cliente, pedido.Fecha, producto.Nombre as producto, tipoproducto.Nombre as tipoproducto, dllpedido.Cantidad,dllpedido.Total,pedido.Estado FROM pedido 
            JOIN usuarios on (pedido.Documento = usuarios.Documento)
            JOIN dllpedido on (pedido.IdPedido = dllpedido.IdPedido)
            JOIN producto on (dllpedido.IdProducto = producto.IdProducto)
            JOIN tipoproducto on (producto.TipodeProducto = tipoproducto.IdTipoProducto)
                                WHERE usuarios.Documento ='.$document); //definir sentencia sql
            $sql->execute(); // ejecutar la consulta
            return $sql->fetchAll(); // retorna todos los registros de la consulta
            Db::CerrarConexion($Db);
        }



        public function ListardetallePedido($idpedido)
        {
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->query('SELECT dllpedido.*,usuarios.Nombre as NombreU,producto.Nombre as NombreP, tipoproducto.Nombre as NombreT,producto.Precio as PrecioP FROM dllpedido 
            JOIN pedido on (pedido.IdPedido = dllpedido.IdPedido)
            JOIN usuarios on (pedido.Documento = usuarios.Documento)
            JOIN producto on (dllpedido.IdProducto = producto.IdProducto)
            JOIN tipoproducto ON (producto.TipodeProducto = tipoproducto.IdTipoProducto) 
            WHERE dllpedido.IdPedido='. $idpedido); //definir sentencia sql
            $sql->execute(); // ejecutar la consulta
            return $sql->fetchAll(); // retorna todos los registros de la consulta
            Db::CerrarConexion($Db);
        }


        public function eliminardetallepedido($iddetallepedido)
        {
            $mensaje = " ";
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->query("DELETE FROM dllpedido WHERE IdDtllPedido = $iddetallepedido"); //definir sentencia sql
            try{
                $sql->execute();
                $mensaje = "Eliminacio EXITOSA ";
            }
            catch(Exception $e)
            {
                $mensaje = $e->getMessage();
            }
            Db::CerrarConexion($Db);
            return $mensaje;
        }

 
        public function CambiarEstadoDetallePedido($id)
        {
            $mensaje = "";
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->prepare('UPDATE pedido set Estado = !Estado WHERE IdPedido ='.$id); //definir sentencia sql
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