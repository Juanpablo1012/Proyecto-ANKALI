<?php
    class Pedidos
    {
        private $IdPedido;
        private $Documento;
        private $Fecha;
        private $Estado = 1 ;


        public function __construct()
        {

        }

        public function setIdPedido($IdPedido)
        {
            $this->IdPedido=$IdPedido;
        }

        public function getIdPedido()
        {
            return $this->IdPedido;
        }

        public function setDocumento($Documento)
        {
            $this->Documento=$Documento;
        }

        public function getDocumento()
        {
            return $this->Documento;
        }

        
        public function setFecha($Fecha)
        {
            $this->Fecha=$Fecha;
        }

        public function getFecha()
        {
            return $this->Fecha;
        }
        
        public function setEstado($Estado)
        {
            $this->Estado=$Estado;
        }

        public function getEstado()
        {
            return $this->Estado;
        }

    }
?>