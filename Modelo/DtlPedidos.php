<?php
    class DtlPedidos
    {
        private $IdDtllPedido;
        private $IdProducto;
        private $IdPedido;
        private $Total;
        private $Cantidad;



        public function __construct()
        {

        }

        public function setIdDtllPedido($IdDtllPedido)
        {
            $this->IdDtllPedido=$IdDtllPedido;
        }

        public function getIdDtllPedido()
        {
            return $this->IdDtllPedido;
        }

        public function setIdProducto($IdProducto)
        {
            $this->IdProducto=$IdProducto;
        }

        public function getIdProducto()
        {
            return $this->IdProducto;
        }

        
        public function setIdPedido($IdPedido)
        {
            $this->IdPedido=$IdPedido;
        }

        public function getIdPedido()
        {
            return $this->IdPedido;
        }
       
        public function setTotal($Total)
        {
            $this->Total=$Total;
        }

        public function getTotal()
        {
            return $this->Total;
        }
        
        
        public function setCantidad($Cantidad)
        {
            $this->Cantidad=$Cantidad;
        }

        public function getCantidad()
        {
            return $this->Cantidad;
        }
    }
?>