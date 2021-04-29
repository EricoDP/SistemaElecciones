<?php

  class candidatosService extends ServiceFileBase{

    public function __construct(){
      $ruta = "../../";
      $filename = "candidatos";
      parent::__construct($ruta, $filename);
    }
  }

?>