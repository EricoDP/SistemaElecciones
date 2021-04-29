<?php

  interface iServiceFile{

    public function GetList();

    public function GetByID($id);

    public function Add($item);

    public function Edit($item);

    public function Delete($id);
  }

?>