<?php
  include '../../layout/_Layout.php';

  require_once '../../handlers/IFileHandler.php';
  require_once '../../handlers/FileHandlerBase.php';
  require_once '../../handlers/JsonFileHandler.php';
  require_once '../../handlers/Logger.php';
  
  require_once '../../services/iServiceFile.php';
  require_once '../../services/ServiceFileBase.php';
  require_once '../../services/candidatosService.php';
  require_once '../../services/utilities.php';
  require_once '../../models/candidatos.php';

  $service = new candidatosService();

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
      <div class="fw-bold">Formulario de transaccion</div>
      <div class="ms-1">
        <div class="mb-3">
          <label for="txtMonto" class="form-label">Monto</label>
          <div class="input-group mb-3">
            <span class="input-group-text">$</span>
            <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="Monto">
            <span class="input-group-text">.00</span>
          </div>
        </div>
        <div class="md-3">
          <label for="txtDescripcion" class="form-label">Descripcion</label>
          <textarea class="form-control" name="Descripcion" id="txtDescripcion" rows="3"></textarea>
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