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

$utilities = new Utilities();
$service = new ServiceFile("puestos");

$puesto = null;
if (isset($_GET["id"])) {
  $puesto = $service->GetByID($_GET["id"]);
}

if (isset($_POST["ID"]) && isset($_POST["Nombre"]) && isset($_POST["Descripcion"]) && isset($_POST["Estado"])) {
  if (($_POST["Nombre"] != null) && ($_POST["Descripcion"] != null)) {

    if($_POST["Estado"] == "True"){
      $estado = True;
    }elseif ($_POST["Estado"] == "False") {
      $estado = false;
    }

    $puesto = new Puesto(
      $_POST["Nombre"],
      $_POST["Descripcion"],
      $estado
    );

    $puesto->ID = $_POST["ID"];
    $service->Edit($puesto);
    header("Location: ./index.php");
  }
}

?>

<?php topContent() ?>

<?php if ($puesto == null) : ?>
  <h3 class="w-100 text-center">No hay registro de ese puesto</h3>
<?php else : ?>
  <main class="">
    <div class="container bg-dark text-light rounded-top py-1">
      <h5 class="text-center" id="offcanvasExampleLabel">Editar puesto</h5>
    </div>
    <div class="container border border-rounded bg-white py-3 px-5 rounded-bottom">
      <div class="fw-bold">Formulario de puesto</div>
      <hr class="mt-0">
      <form class="ms-1" action="./edit.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="ID" value="<?= $puesto->ID ?>">
        <div class="modal-body">
          <div class="ms-1">
            <div class="mb-3">
              <label for="txtNombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="Nombre" value="<?= $puesto->Nombre ?>">
            </div>
          </div>
          <div class="mb-3">
            <label for="txtDescripcion" class="form-label">Descripcion</label>
            <textarea class="form-control" name="Descripcion" id="txtDescripcion" rows="3"><?= $puesto->Descripcion ?></textarea>
          </div>
          <div class="mb-3">
            <label for="btnradio1" class="form-label">Estado</label>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="Estado" value="True" id="btnradio1" autocomplete="off"
              <?php if($puesto->Estado == True): ?>checked<?php endif; ?>>
            <label class="btn btn-outline-primary" for="btnradio1">Activo</label>
            <input type="radio" class="btn-check" name="Estado" id="btnradio2" value="False" autocomplete="off"
              <?php if($puesto->Estado == False): ?>checked<?php endif; ?>>
            <label class="btn btn-outline-primary" for="btnradio2">Inactivo</label>
          </div>
        </div>
        <div class="d-grid gap-2">
          <button class="btn btn-primary" type="submit">Editar</button>
          <a href="./index.php" class="btn btn-outline-secondary">Regresar</a>
        </div>
      </form>
    </div>
  </main>
<?php endif; ?>

<?php bottomContent() ?>