<?php
  include '../../layout/_Layout.php';

  require_once '../../handlers/IFileHandler.php';
  require_once '../../handlers/FileHandlerBase.php';
  require_once '../../handlers/JsonFileHandler.php';
  require_once '../../handlers/Logger.php';
  
  require_once '../../services/iServiceFile.php';
  require_once '../../services/ServiceFileBase.php';
  require_once '../../services/eleccionesService.php';
  require_once '../../services/utilities.php';
  require_once '../../models/elecciones.php';

  $service = new ciudadanosService();

  if(isset($_POST["Nombre"]) &&  isset($_POST["Estado"]))
  {
    if($_POST["Nombre"] != null && isset($_POST["Estado"]) != null)
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
      <div class="fw-bold">Agregar eleccion</div>
      <div class="ms-1">
        <div class="mb-3">
          <label for="txtNombre" class="form-label">Nombre</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="Nombre">
          </div>
        </div>
        <div class="md-3">
          <label for="txtEstado" class="form-label">Estado</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="Estado">
          </div>
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