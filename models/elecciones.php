<?php
  class Elecciones
  {
    public $ID;
    public $Nombre;
    public $Fecha;
    public $Estado;

    public function __construct($nombre, $estado, $fecha)
    {
      $this->Nombre = $nombre;
      $this->Fecha = $fecha;
      $this->Estado = $estado;
    }
  }
?>