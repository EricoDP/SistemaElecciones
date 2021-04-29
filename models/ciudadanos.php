<?php
  class Ciudadanos
  {
    public $DocIdentidad;
    public $Nombre;
    public $Apellido;
    public $Email;
    public $Estado;

    public function __construct($nombre, $estado, $apellido, $email,)
    {
      $this->Nombre = $nombre;
      $this->Apellido = $apellido;
      $this->Estado = $estado;
      $this->Email = $email;
    }
  }
?>