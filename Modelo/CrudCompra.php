<?php
    class CrudCompra{
        public function __construct()
        {}

        public function CrearCompra($compra)
        {
            $mensaje=""; 
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->prepare('INSERT INTO compra(Factura,Fecha,Total,DocumentoUsuario)
            VALUES (:Factura,:Fecha,:Total,:DocumentoUsuario)'); //definir sentencia sql
            $sql->bindvalue('Factura',$compra->getFactura());
            $sql->bindvalue('Fecha',$compra->getFecha());
            $sql->bindvalue('Total',$compra->getTotal());
           $sql->bindvalue('DocumentoUsuario',$compra->getDocumentoUsuario());
 
            try{
                $sql->execute();
                echo 
                '<script>
                    alert("Compra registrada exitosamente.");
                    window.location="../Vista/Listar_Compra.php";
                </script>';
            }
            catch(Exception $e)
            {
                echo 
                '<script>
                    alert("No se a podido registrar, intentlo nuevamente.");
                    window.location="../Vista/Compras.php";
                </script>';
            }
            Db::CerrarConexion($Db);
            return $mensaje;
        }

        public function ListarCompra()
        {
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->query('SELECT compra.*,usuarios.Nombre as nombreU FROM `compra`
            JOIN usuarios on (compra.DocumentoUsuario = usuarios.Documento)'); //definir sentencia sql
            $sql->execute(); // ejecutar la consulta
            return $sql->fetchAll(); // retorna todos los registros de la consulta
            Db::CerrarConexion($Db);
        }
        public function EditarCompra($Compra)
        {
            $mensaje = "";
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->prepare('UPDATE compra 
            SET Factura = :Factura,
            Fecha=:Fecha, 
            Total= :Total, 
            DocumentoUsuario = :DocumentoUsuario,
            WHERE IdCompra=:IdCompra'); //definir sentencia sql
            $sql->bindvalue('Factura',$Compra->getFactura());
            $sql->bindvalue('Fecha',$Compra->getFecha());
            $sql->bindvalue('Total',$Compra->getTotal());
            $sql->bindvalue('DocumentoUsuario',$Compra->getDocumentoUsuario());
            $sql->bindvalue('IdCompra',$Compra->getIdCompra());

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

        public function BuscarCompra($Compra)
        {
            $usu = new  Compras();
            $Db = Db::Conectar(); // conectar bd
            $sql = $Db->prepare('SELECT * FROM compra 
            WHERE IdCompra =:IdCompra'); //definir sentencia sql
            $sql->bindvalue('IdCompra',$Compra);
        
            try{
                $sql->execute();
                $registro = $sql->fetch();
                $usu->setIdCompra($registro['IdCompra']);
                $usu->setFactura($registro['Factura']);
                $usu->setFecha($registro['Fecha']); 
                $usu->setTotal($registro['Total']); 
                $usu->setDocumentoUsuario($registro['DocumentoUsuario']); 
            }
                catch(Exception $e)
                {
                    echo $e->getMessage();
                }
                Db::CerrarConexion($Db);
                return $usu;
        }
    }
?>