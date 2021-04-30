<?php

  class ServiceFileBase implements iServiceFile{

    protected $jsonHandler;
    protected $Utilities;
    protected $directory;

    public function __construct($ruta, $filename){
      $this->directory = "{$ruta}data";
      $this->jsonHandler = new JsonFileHandler($this->directory,$filename);
      $this->Utilities = new Utilities();
    }

    public function GetList(){
      $collection = $this->jsonHandler->ReadFile();
      if($collection == null){
        $collection = array();
      }
      return (array)$collection;
    }

    public function GetActive(){
      $collection = $this->GetList();
    }

    public function GetByID($id){
      $collection = $this->GetList();
      $model = $this->Utilities->SearchProperty($collection, "ID", $id);
      return ((count($model) == 0) ? null : $model[0]);
    }

    public function Add($item){
      $collection = $this->GetList();
      do {
        $not_in_list = true;
        $id = uniqid('',true);
        foreach ($collection as $model) {
          if($id == $model->ID){
            $not_in_list = false;
          }
        }
      } while ($not_in_list == false);

      $item->ID = $id;
      array_push($collection,$item);
      $log = new Logger("Insertar",$item);
      $log->writeAddLog();
      $this->jsonHandler->SaveFile($collection);
    }

    public function Edit($item){
      $collection = $this->GetList();
      $index = $this->Utilities->GetIndexElement($collection, "ID", $item->ID);
      if($index !== null){
        $lastItem = $this->GetByID($item->ID);
        $collection[$index] = $item;
        $log = new Logger("Editar",$item);
        $log->writeEditLog($lastItem);
        $this->jsonHandler->SaveFile($collection);
      }
    }

    public function Delete($id){
      $collection = $this->GetList();
      $index = $this->Utilities->getIndexElement($collection,"ID",$id);
      if($index !== null){
        unset($collection[$index]);
        $log = new Logger("Eliminar",$this->GetByID($id));
        $log->writeDeleteLog();
        $this->jsonHandler->SaveFile($collection);
      }
    }
  }

?>