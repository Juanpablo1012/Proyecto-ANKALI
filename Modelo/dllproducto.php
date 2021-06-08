<?php
    class dllproducto
    {
        private $IdDeProducto;
        private $IdProducto;
        private $IdInsumo;
        private $Cantidad;
        private $Total;
        



        public function __construct()
        {

        }

        public function setIdDeProducto($IdDeProducto)
        {
            $this->IdDeProducto=$IdDeProducto;
        }

        public function getIdDeProducto()
        {
            return $this->IdDeProducto;
        }

        public function setIdProducto($IdProducto)
        {
            $this->IdProducto=$IdProducto;
        }

        public function getIdProducto()
        {
            return $this->IdProducto;
        }

        
        public function setIdInsumo($IdInsumo)
        {
            $this->IdInsumo=$IdInsumo;
        }

        public function getIdInsumo()
        {
            return $this->IdInsumo;
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