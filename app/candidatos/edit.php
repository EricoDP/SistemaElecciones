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

  $utilities = new Utilities();
  $service = new candidatosService();

  $transaccion = null;
  if(isset($_GET["id"])){
    $transaccion = $service->GetByID($_GET["id"]);
  }

  if(isset($_POST["ID"]) && isset($_POST["Monto"]) && isset($_POST["Descripcion"]) && isset($_POST["Fecha"])){

    $transaccion = new Transaccion(
      $_POST["Fecha"],
      $_POST["Monto"],
      $_POST["Descripcion"]
    );

    $transaccion->ID = $_POST["ID"];
    $service->Edit($transaccion);
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