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
require_once '../../models/puestos.php';

$service = new ServiceFile("puestos");

if (isset($_POST["Nombre"]) && isset($_POST["Descripcion"])) {
  if ($_POST["Nombre"] != "" && isset($_POST["Descripcion"]) != null) {

    $puesto = new Puesto(
      $_POST["Nombre"],
      $_POST["Descripcion"],
      True
    );

    $service->Add($puesto);
  } else {
    echo '<script>alert("Debe llenar todos los campos correctamente")</script>';
  }
  header("Location: ./index.php");
}

?>

<?php topContent() ?>

<div class="container">
  <form class="ms-1 border border-rounded" action="./add.php" method="POST" enctype="multipart/form-data">
    <div class="modal-body">
      <div class="fw-bold">Formulario de transaccion</div>
      <div class="ms-1">
        <div class="mb-3">
          <label for="txtNombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" name="Nombre">
        </div>
        <div class="mb-3">
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