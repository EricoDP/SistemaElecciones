<?php
  class Candidatos
  {
    public $ID;
    public $Nombre;
    public $Apellido;
    public $Partido_pertenece;
    public $Partido_aspira;
    public $Foto;
    public $Estado;

    public function __construct($nombre, $apellido, $partido_pertenece, $partido_aspira, $foto, $estado)
    {
      $this->Nombre = $nombre;
      $this->Apellido = $apellido;
      $this->Partido_pertenece = $partido_pertenece;
      $this->Partido_aspira = $partido_aspira;
      $this->Foto = $foto;
      $this->Estado = $estado;
    }
  }
?>