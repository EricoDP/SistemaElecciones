<?php
  include '../../layout/_Layout.php';

  require_once '../../handlers/IFileHandler.php';
  require_once '../../handlers/FileHandlerBase.php';
  require_once '../../handlers/JsonFileHandler.php';
  require_once '../../handlers/Logger.php';
  
  require_once '../../services/iServiceFile.php';
  require_once '../../services/ServiceFileBase.php';
  require_once '../../services/candidatosService.php';
  require_once '../../services/partidosService.php';
  require_once '../../services/utilities.php';
  require_once '../../models/candidatos.php';

  $service = new candidatosService();
  $partidoService = new partidosService();

  $partidos = $partidoService->GetList();

  if(isset($_POST["Monto"]) && isset($_POST["Descripcion"]))
  {
    if($_POST["Monto"] != "" && isset($_POST["Descripcion"]) != null)
    {
      date_default_timezone_set("America/Santo_Domingo");
      $fecha = date('d-m-y h:iA', time());


      $service->Add($transaccion);
    }
    else{
      echo '<script>alert("Debe llenar todos los campos correctamente")</script>';
    }
    header("Location: ../index.php");
  }

?>

<?php topContent()?>

<div class="container">
  <form class="ms-1 border border-rounded" action="./operations/add.php" method="POST" enctype="multipart/form-data">
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
              <option value="<?= $partido->ID?>"><?= $partido->Nombre;?></option>
            <?php endforeach;?>

          </select>
        </div>
        <div class="mb-3">
          <label for="cbPartido_aspira" class="form-label">Partido que aspira</label>
          <select class="form-select" aria-label="Select Partido_aspira" id="cbPartido_aspira" name="Partido_aspiraID">
            <option selected>Seleccione una opcion</option>

            <?php foreach($partidos as $key => $partido):?>
              <option value="<?= $partido->ID?>"><?= $partido->Nombre;?></option>
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
      <button type="submit" class="btn btn-primary">Agregar</button>
    </div>
  </form>
</div>

<?php bottomContent() ?>