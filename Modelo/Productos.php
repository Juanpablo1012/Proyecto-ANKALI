<?php
    class Productos
    {
        private $IdProducto;
        private $Nombre;
        private $Precio;
        private $Stock;
        private $Estado = 1;
        private $TipoProducto = 1;

        public function __construct()
        {

        }

        public function setIdProducto($IdProducto)
        {
            $this->IdProducto=$IdProducto;
        }

        public function getIdProducto()
        {
            return $this->IdProducto;
        }

        public function setNombreP($Nombre)
        {
            $this->Nombre=$Nombre;
        }

        public function getNombreP()
        {
            return $this->Nombre;
        }

        
        public function setPrecio($Precio)
        {
            $this->Precio=$Precio;
        }

        public function getPrecio()
        {
            return $this->Precio;
        }
        
        public function setStock($Stock)
        {
            $this->Stock=$Stock;
        }

        public function getStock()
        {
            return $this->Stock;
        }
        
        public function setEstado($Estado)
        {
            $this->Estado=$Estado;
        }

        public function getEstado()
        {
            return $this->Estado;
        }
        
        public function setTipoProducto($TipoProducto)
        {
            $this->TipoProducto=$TipoProducto;
        }

        public function getTipoProducto()
        {
            return $this->TipoProducto;
        }
    }
?>