<?php
  class Partido
  {
    public $ID;
    public $Nombre;
    public $Descripcion;
    public $Estado;
    public $Logo;

    public function __construct($nombre, $descripcion, $logo, $estado)
    {
      $this->Nombre = $nombre;
      $this->Descripcion = $descripcion;
      $this->Estado = $estado;
      $this->Logo = $logo;
    }
  }
?>