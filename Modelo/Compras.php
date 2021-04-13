<?php
    class Compras
    {
        private $IdCompra;
        private $Factura;
        private $Fecha;
        private $Total;
        private $DocumentoUsuario;
        public function __construct()
        {

        }

        public function setIdCompra($IdCompra)
        {
            $this->IdCompra=$IdCompra;
        }

        public function getIdCompra()
        {
            return $this->IdCompra;
        }

        public function setImagen($Imagen)
        {
            $this->Imagen=$Imagen;
        }

        public function getImagen()
        {
            return $this->Imagen;
        }

        
        public function setFecha($Fecha)
        {
            $this->Fecha=$Fecha;
        }

        public function getFecha()
        {
            return $this->Fecha;
        }
        
        public function setTotal($Total)
        {
            $this->Total=$Total;
        }

        public function getTotal()
        {
            return $this->Total;
        }

       
        public function setDocumentoUsuario($DocumentoUsuario)
        {
            $this->DocumentoUsuario=$DocumentoUsuario;
        }

        public function getDocumentoUsuario()
        {
            return $this->DocumentoUsuario;
        }
        
        
    }
?>