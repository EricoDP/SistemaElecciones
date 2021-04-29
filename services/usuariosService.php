<?php

  class usuariosService extends ServiceFileBase{

    public function __construct(){
      $ruta = "../../";
      $filename = "usuarios";
      parent::__construct($ruta, $filename);
    }
  }

?>