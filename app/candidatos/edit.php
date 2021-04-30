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

$utilities = new Utilities();
$service = new ServiceFile("candidatos");

$partidoService = new ServiceFile("partidos");

$partidos = $partidoService->GetList();


$candidato = null;
if (isset($_GET["id"])) {
  $candidato = $service->GetByID($_GET["id"]);
}

if (isset($_POST["Nombre"]) && isset($_POST["Apellido"]) && isset($_POST["Partido_perteneceID"]) && isset($_POST["Partido_aspiraID"]) && isset($_FILES["Foto"]) && isset($_POST["Estado"])) {
  if (($_POST["Nombre"] != null) && ($_POST["Apellido"] != null) && ($_POST["Partido_perteneceID"] != null) && ($_POST["Partido_aspiraID"] != null) && ($_FILES["Foto"] != null)) {

    if ($_FILES["Foto"]["name"] != null) {
      $target_dir = "../../assets/img/";
      if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755);
      }
      $imgname = $_FILES["Foto"]["tmp_name"];
      $imgdestination = $target_dir . $_FILES["Foto"]["name"];
      move_uploaded_file($imgname, $imgdestination);
      $img = 'img/' . $_FILES["Foto"]["name"];
    }

    $candidato = new Candidato(
      $_POST["Nombre"],
      $_POST["Apellido"],
      $_POST["Partido_perteneceID"],
      $_POST["Partido_aspiraID"],
      "img/" . $_FILES["Foto"]["name"],
      $_POST["Estado"]
    );

    $candidato->ID = $_POST["ID"];
    $service->Edit($candidato);
    header("Location: ./index.php");
  } else {
    echo '<script>alert("Debe llenar todos los campos correctamente")</script>';
  }
  header("Location: ./index.php");
}
?>

<?php topContent() ?>

<?php if ($candidato == null) : ?>
  <h3 class="w-100 text-center">No hay registro de esa transacion</h3>
<?php else : ?>
  <div class="container">
    <form class="ms-1 border border-rounded" action="./edit.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="fw-bold">Agregar candidato</div>
        <div class="ms-1">
          <div class="mb-3">
            <label for="txtNombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="Nombre" value="<?= $candidato->Nombre ?>">
          </div>
          <div class="mb-3">
            <label for="txtApellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="Apellido" value="<?= $candidato->Apellido ?>">
          </div>
          <div class="mb-3">
            <label for="cbPartido_pertenece" class="form-label">Partido que pertenece</label>
            <select class="form-select" aria-label="Select Partido_pertenece" id="cbPartido_pertenece" name="Partido_perteneceID">
              <option selected>Seleccione una opcion</option>
              
              <?php foreach ($partidos as $key => $partido) : ?>
                <option value="<?= $partido->ID ?>"
                <?php if ($partido->ID == $candidato->Partido_pertenece): ?>
                  selected
                <?php endif; ?>
                ><?= $partido->Nombre; ?></option>
              <?php endforeach; ?>

            </select>
          </div>
          <div class="mb-3">
            <label for="cbPartido_aspira" class="form-label">Partido que aspira</label>
            <select class="form-select" aria-label="Select Partido_aspira" id="cbPartido_aspira" name="Partido_aspiraID">
              <option selected>Seleccione una opcion</option>

              <?php foreach ($partidos as $key => $partido) : ?>
                <option value="<?= $partido->ID ?>"
                <?php if ($partido->ID == $candidato->Partido_aspira): ?>
                  selected
                <?php endif; ?>
                ><?= $partido->Nombre; ?></option>
              <?php endforeach; ?>

            </select>
          </div>
          <div class="mb-3">
            <label for="imgFoto" class="form-label">Foto</label>
            <input class="form-control" type="file" id="imgFoto" name="Foto">
          </div>
          <div class="mb-3">
            <label for="btnradio1" class="form-label">Estado</label>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="Estado" value="Activo" id="btnradio1" autocomplete="off"
              <?php if($candidato->Estado == True): ?>checked<?php endif; ?>>
            <label class="btn btn-outline-primary" for="btnradio1">Activo</label>
            <input type="radio" class="btn-check" name="Estado" id="btnradio2" value="Inactivo" autocomplete="off"
              <?php if($candidato->Estado == False): ?>checked<?php endif; ?>>
            <label class="btn btn-outline-primary" for="btnradio2">Inactivo</label>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="./index.php" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</a>
        <button type="submit" class="btn btn-primary">Editar</button>
      </div>
    </form>
  <?php endif; ?>
  </div>

  <?php bottomContent() ?>