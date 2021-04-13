<?php
    class Productos
    {
        private $IdProducto;
        private $Nombre;
        private $Precio;
        private $Imagen = "Defaul.png";
        private $Descripcion;
        private $Stock;
        private $Estado = 1;
        private $TipoProducto;

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

        public function setNombre($Nombre)
        {
            $this->Nombre=$Nombre;
        }

        public function getNombre()
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
        
        public function setImagen($Imagen)
        {
            $this->Imagen=$Imagen;
        }

        public function getImagen()
        {
            return $this->Imagen;
        }

       
        public function setDescripcion($Descripcion)
        {
            $this->Descripcion=$Descripcion;
        }

        public function getDescripcion()
        {
            return $this->Descripcion;
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