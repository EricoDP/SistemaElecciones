<?php
include '../../layout/_Layout.php';

require_once '../../handlers/IFileHandler.php';
require_once '../../handlers/FileHandlerBase.php';
require_once '../../handlers/JsonFileHandler.php';
require_once '../../handlers/Logger.php';

require_once '../../services/iServiceFile.php';
require_once '../../services/ServiceFileBase.php';
require_once '../../services/ServiceFile.php';
require_once '../../services/utilities.php';
require_once '../../models/candidatos.php';

  $service = new ServiceFile("candidatos");
  $partidoService = new ServiceFile("partidos");

  $partidos = $partidoService->GetList();

  if(isset($_POST["Nombre"]) && isset($_POST["Apellido"]) && isset($_POST["Partido_perteneceID"]) && isset($_POST["Partido_aspiraID"]) && isset($_FILES["Foto"]))
  {
    if(($_POST["Nombre"] != null) && ($_POST["Apellido"] != null) && ($_POST["Partido_perteneceID"] != null) && ($_POST["Partido_aspiraID"] != null) && ($_FILES["Foto"] != null))
    {
      $target_dir = "../../assets/img/";
      if(!is_dir($target_dir)){
        mkdir($target_dir, 0755);
      }

      $imgname = $_FILES["Foto"]["tmp_name"];
      $imgdestination = $target_dir . $_FILES["Foto"]["name"];

      $candidato = new Candidato(
        $_POST["Nombre"],
        $_POST["Apellido"],
        $_POST["Partido_perteneceID"],
        $_POST["Partido_aspiraID"],
      "img/" . $_FILES["Foto"]["name"],
        True
      );

      move_uploaded_file($imgname, $imgdestination);

      $service->Add($candidato);
    }
    else{
      echo '<script>alert("Debe llenar todos los campos correctamente")</script>';
    }
    header("Location: ./index.php");
  }

?>

<?php topContent()?>

<div class="container">
  <form class="ms-1 border border-rounded" action="./add.php" method="POST" enctype="multipart/form-data">
    <div class="modal-body">
      <div class="fw-bold">Agregar candidato</div>
      <div class="ms-1">
        <div class="mb-3">
          <label for="txtNombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" name="Nombre">
        </div>
        <div class="mb-3">
          <label for="txtApellido" class="form-label">Apellido</label>
          <input type="text" class="form-control" name="Apellido">
        </div>
        <div class="mb-3">
          <label for="cbPartido_pertenece" class="form-label">Partido que pertenece</label>
          <select class="form-select" aria-label="Select Partido_pertenece" id="cbPartido_pertenece" name="Partido_perteneceID">
            <option selected>Seleccione una opcion</option>

            <?php foreach($partidos as $key => $partido):?>
              <?php if($partido->Estado == true): ?>
                <option value="<?= $partido->ID?>"><?= $partido->Nombre;?></option>
              <?php endif; ?>
            <?php endforeach;?>

          </select>
        </div>
        <div class="mb-3">
          <label for="cbPartido_aspira" class="form-label">Partido que aspira</label>
          <select class="form-select" aria-label="Select Partido_aspira" id="cbPartido_aspira" name="Partido_aspiraID">
            <option selected>Seleccione una opcion</option>

            <?php foreach($partidos as $key => $partido):?>
              <?php if($partido->Estado == true): ?>
                <option value="<?= $partido->ID?>"><?= $partido->Nombre;?></option>
              <?php endif; ?>
            <?php endforeach;?>

          </select>
        </div>
        <div class="mb-3">
          <label for="imgFoto" class="form-label">Foto</label>
          <input class="form-control" type="file" id="imgFoto" name="Foto">
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <a href="./index.php" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</a>
      <button type="submit" class="btn btn-primary">Ingresar</button>
    </div>
  </form>
</div>

<?php bottomContent() ?>