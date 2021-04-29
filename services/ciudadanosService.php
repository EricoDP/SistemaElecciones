<?php

  class ciudadanosService extends ServiceFileBase{

    public function __construct(){
      $ruta = "../../";
      $filename = "ciudadanos";
      parent::__construct($ruta, $filename);
    }
  }

?>