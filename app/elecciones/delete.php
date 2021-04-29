<?php

require_once '../../handlers/IFileHandler.php';
require_once '../../handlers/FileHandlerBase.php';
require_once '../../handlers/JsonFileHandler.php';
require_once '../../handlers/Logger.php';

require_once '../../services/iServiceFile.php';
require_once '../../services/ServiceFileBase.php';
require_once '../../services/ServiceFile.php';
  require_once '../../services/utilities.php';
  require_once '../../models/elecciones.php';

  $service = new ServiceFile("elecciones");

  if(isset($_GET["id"])){
    $service->Delete($_GET["id"]);
  }

  header("Location: ./index.php");
  exit();

?>