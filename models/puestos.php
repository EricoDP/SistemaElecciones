<?php
  class Puesto
  {
    public $ID;
    public $Nombre;
    public $Descripcion;
    public $Estado;

    public function __construct($nombre, $descripcion, $estado)
    {
      $this->Nombre = $nombre;
      $this->Descripcion = $descripcion;
      $this->Estado = $estado;
    }
  }
?>