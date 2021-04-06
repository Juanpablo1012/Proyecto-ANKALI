<?php
class Servicios{
    private $IdServicio;
    private $Nombre;
    private $Descripcion;
    private $Imagen = "Defaul.png";
    private $Precio;
    private $Estado = 1;

    public function __construct(){

    }

        public function setIdServicio($IdServicio)
        {
            $this->IdServicio=$IdServicio;
        }

        public function getIdServicio()
        {
            return $this->IdServicio;
        } 

        public function setNombre($Nombre)
        {
            $this->Nombre=$Nombre;
        }

        public function getNombre()
        {
            return $this->Nombre;
        }
        
        public function setDescripcion($Descripcion)
        {
            $this->Descripcion=$Descripcion;
        }

        public function getDescripcion()
        {
            return $this->Descripcion;
        }
        
        public function setImagen($Imagen)
        {
            $this->Imagen=$Imagen;
        }

        public function getImagen()
        {
            return $this->Imagen;
        }
        public function setPrecio($Precio)
        {
            $this->Precio=$Precio;
        }

        public function getPrecio()
        {
            return $this->Precio;
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