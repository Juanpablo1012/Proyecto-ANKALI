<?php
class Servicios{
    private $IdServicios;
    private $Nombre;
    private $Descripcion;
    private $Imagen = "Defaul.png";
    private $Precio;
    private $Estado = 1;

    public function __construct(){

    }

        public function setIdServicios($IdServicios)
        {
            $this->IdServicios=$IdServicios;
        }

        public function getIdServicios()
        {
            return $this->IdServicios;
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