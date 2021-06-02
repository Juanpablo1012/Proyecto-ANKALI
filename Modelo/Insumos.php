<?php
class Insumos{
    private $Idinsumo;
    private $Nombre;

    private $Imagen = "Defaul.png";
    private $Precio;
    private $Stock;
    private $Estado = 1;

    public function __construct(){

    }

        public function setIdinsumo($Idinsumo)
        {
            $this->Idinsumo=$Idinsumo;
        }

        public function getIdinsumo()
        {
            return $this->Idinsumo;
        } 

        public function setNombre($Nombre)
        {
            $this->Nombre=$Nombre;
        }

        public function getNombre()
        {
            return $this->Nombre;
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
}
?>