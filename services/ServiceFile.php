<?php

  class ServiceFile extends ServiceFileBase{

    public function __construct($filename){
      $ruta = "../../";
      parent::__construct($ruta, $filename);
    }

  }

?>