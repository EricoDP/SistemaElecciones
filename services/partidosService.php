<?php

  class partidosService extends ServiceFileBase{

    public function __construct(){
      $ruta = "../../";
      $filename = "partidos";
      parent::__construct($ruta, $filename);
    }
  }

?>