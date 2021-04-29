<?php

  class eleccionesService extends ServiceFileBase{

    public function __construct(){
      $ruta = "../../";
      $filename = "elecciones";
      parent::__construct($ruta, $filename);
    }
  }

?>