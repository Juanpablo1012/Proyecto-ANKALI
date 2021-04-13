<?php
    class Usuarios
    {
        private $Documento;
        private $Nombre;
        private $Telefono;
        private $Direccion; 
        private $Correo;
        private $Contrasena;
        private $Estado = 1; //1 true, 0 false
        private $IdRol = 2;
        private $Existe;
        
        public function __construct()
            {}

        public function setDocumento($Documento)
        {
            $this->Documento=$Documento;
        }

        public function getDocumento()
        {
            return $this->Documento;
        }

        public function setNombre($Nombre)
        {
            $this->Nombre=$Nombre;
        }

        public function getNombre()
        {
            return $this->Nombre;
        }

        public function setTelefono($Telefono)
        {
            $this->Telefono=$Telefono;
        }

        public function getTelefono()
        {
            return $this->Telefono;
        }

        public function setDireccion($Direccion)
        {
            $this->Direccion=$Direccion;
        }

        public function getDireccion()
        {
            return $this->Direccion;
        }

        public function setCorreo($Correo)
        {
            $this->Correo=$Correo;
        }

        public function getCorreo()
        {
            return $this->Correo;
        }

        
        public function setContrasena($Contrasena)
        {
            $this->Contrasena=$Contrasena;
        }

        public function getContrasena()
        {
            return $this->Contrasena;
        }
        public function setEstado($Estado)
        {
            $this->Estado=$Estado;
        }

        public function getEstado()
        {
            return $this->Estado;
        }
        public function setIdRol($IdRol)
        {
            $this->IdRol=$IdRol;
        }
        public function getIdRol()
        {
            return $this->IdRol;
        }
        public function setExiste($Existe)
        {
            $this->Existe=$Existe;
        }
        public function getExiste()
        {
            return $this->Existe;
        }
    }
    

?>