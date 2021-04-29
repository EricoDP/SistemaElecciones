<?php
require_once '../FileHandler/IFileHandler.php';
require_once '../FileHandler/FileHandlerBase.php';
require_once '../FileHandler/SerializationFileHandler.php';
require_once '../FileHandler/JsonFileHandler.php';
require_once '../FileHandler/CsvFileHandler.php';
require_once '../FileHandler/Logger.php';

require_once './serviceFile.php';
require_once '../helpers/utilities.php';
require_once '../models/puesto.php';

$utilities = new Utilities();
$service = new ServiceFile("../");

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

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Bootstrap-->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <script src="../assets/js/bootstrap.min.js"></script>
  <title>Registro de puestos</title>
</head>

<body class="bg-light">
  <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Top navbar</a>
    </div>
  </nav>

  <!--Edit Content Begin-->

  <?php if ($puesto == null) : ?>
    <h3 class="w-100 text-center">No hay registro de esa transacion</h3>
  <?php else : ?>
    <main class="">
      <div class="container bg-dark text-light rounded-top py-1">
        <h5 class="text-center" id="offcanvasExampleLabel">Editar puesto</h5>
      </div>
      <div class="container bg-white py-3 px-5 rounded-bottom">
        <div class="fw-bold">Formulario de puestoes</div>
        <hr class="mt-0">
        <form class="ms-1" action="./edit.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="ID" value="<?= $puesto->ID ?>">
          <div class="modal-body">
            <div class="ms-1">
              <div class="mb-3">
                <label for="txtNombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="Nombre">
              </div>
            </div>
            <div class="md-3">
              <label for="txtDescripcion" class="form-label">Descripcion</label>
              <textarea class="form-control" name="Descripcion" id="txtDescripcion" rows="3"><?= $puesto->Descripcion ?></textarea>
            </div>
          </div>
      </div>
      <hr>
      <div class="d-grid gap-2">
        <button class="btn btn-primary" type="submit">Editar</button>
        <a href="./index.php" class="btn btn-outline-secondary">Regresar</a>
      </div>
    </main>
  <?php endif; ?>
  <!--Edit Content End-->
</body>

</html>