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
require_once '../../models/partidos.php';

$utilities = new Utilities();
$service = new ServiceFile("partidos");

$partido = null;
if (isset($_GET["id"])) {
  $partido = $service->GetByID($_GET["id"]);
}

if (isset($_POST["ID"]) && isset($_POST["Nombre"]) && isset($_POST["Descripcion"]) && isset($_FILES["Logo"]) && isset($_POST["Estado"])) {
  if ($_POST["Nombre"] != "" && isset($_POST["Descripcion"]) != null) {

    if($_POST["Estado"] == "True"){
      $estado = True;
    }elseif ($_POST["Estado"] == "False") {
      $estado = false;
    }

    $img = ($service->GetByID($_POST["ID"]))->Logo;
    
    if($_FILES["Logo"]["name"] != null){
      $target_dir = "../assets/img/";
      if(!is_dir($target_dir)){
        mkdir($target_dir, 0755);
      }
      $imgname = $_FILES["Logo"]["tmp_name"];
      $imgdestination = $target_dir . $_FILES["Logo"]["name"];
      move_uploaded_file($imgname, $imgdestination);
      $img = 'img/' . $_FILES["Logo"]["name"];
    }

    $partido = new Partido(
      $_POST["Nombre"],
      $_POST["Descripcion"],
      "img/" . $_FILES["Logo"]["name"],
      $estado
    );

    $partido->ID = $_POST["ID"];
    $service->Edit($partido);
    header("Location: ./index.php");
  } else {
    echo '<script>alert("Debe llenar todos los campos correctamente")</script>';
  }
  header("Location: ./index.php");
}

?>

<?php topContent() ?>

<?php if ($partido == null) : ?>
  <h3 class="w-100 text-center">No hay registro de esa transacion</h3>
<?php else : ?>
  <main class="">
    <div class="container bg-dark text-light rounded-top py-1">
      <h5 class="text-center" id="offcanvasExampleLabel">Editar partido</h5>
    </div>
    <div class="container border border-rounded bg-white py-3 px-5 rounded-bottom">
      <div class="fw-bold">Formulario de partidos</div>
      <hr class="mt-0">
      <form class="ms-1" action="./edit.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="ID" value="<?= $partido->ID ?>">
        <div class="modal-body">
          <div class="ms-1">
            <div class="mb-3">
              <label for="txtNombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="Nombre" value="<?= $partido->Nombre ?>">
            </div>
          </div>
          <div class="md-3">
            <label for="txtDescripcion" class="form-label">Descripcion</label>
            <textarea class="form-control" name="Descripcion" id="txtDescripcion" rows="3"><?= $partido->Descripcion ?></textarea>
          </div>
          <div class="mb-3">
            <label for="imgLogo" class="form-label">Logo</label>
            <input class="form-control" type="file" id="imgLogo" name="Logo">
          </div>
          <div class="mb-3">
            <label for="btnradio1" class="form-label">Estado</label>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="Estado" value="True" id="btnradio1" autocomplete="off"
              <?php if($partido->Estado == True): ?>checked<?php endif; ?>>
            <label class="btn btn-outline-primary" for="btnradio1">Activo</label>
            <input type="radio" class="btn-check" name="Estado" id="btnradio2" value="False" autocomplete="off"
              <?php if($partido->Estado == False): ?>checked<?php endif; ?>>
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