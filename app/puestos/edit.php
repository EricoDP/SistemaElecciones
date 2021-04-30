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

  $puesto = new Puesto(
    $_POST["Nombre"],
    $_POST["Descripcion"],
    True
  );

  $puesto->ID = $_POST["ID"];
  $service->Edit($puesto);
  header("Location: ../index.php");
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
        <div class="modal-body">
          <div class="ms-1">
            <div class="mb-3">
              <label for="txtNombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="Nombre">
            </div>
          </div>
          <div class="md-3">
            <label for="txtDescripcion" class="form-label">Descripcion</label>
            <textarea class="form-control" name="Descripcion" id="txtDescripcion" rows="3"><?= $partido->Descripcion ?></textarea>
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