<?php
  class Usuarios
  {
    public $ID;
    public $Nombre;
    public $Apellido;
    public $Email;
    public $Usuario;
    public $Password;
    public $Estado;

    public function __construct($nombre, $apellido, $email, $usuario, $password, $estado)
    {
      $this->Nombre = $nombre;
      $this->Apellido = $apellido;
      $this->Email = $email;
      $this->Usuario = $usuario;
      $this->Password = $password;
      $this->Estado = $estado;
    }
  }
?>