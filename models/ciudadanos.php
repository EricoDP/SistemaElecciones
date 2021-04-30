<?php
  class Ciudadano
  {
    public $Nombre;
    public $Apellido;
    public $Documento;
    public $Email;
    public $Estado;

    public function __construct($nombre, $apellido, $documento, $email, $estado)
    {
      $this->Nombre = $nombre;
      $this->Apellido = $apellido;
      $this->Documento = $documento;
      $this->Estado = $estado;
      $this->Email = $email;
    }
  }
?>