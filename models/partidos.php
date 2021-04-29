<?php
    class Partidos{
        public $ID;
        public $Nombre;
        public $Descripcion;
        public $Estado;
        public $Logo;

        public function __construct($nombre,$estado,$descripcion,$logo){
            $this->Nombre = $nombre;
            $this->Descripcion = $descripcion;
            $this->Estado = $estado;
            $this->Logo = $logo;
        }
    }
?>