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
  require_once '../../models/ciudadanos.php';

  $utilities = new Utilities();
  $service = new ServiceFile("ciudadanos");

  if(isset($_POST["Nombre"]) && isset($_POST["Apellido"]) && isset($_POST["Documento"]) && isset($_POST["Email"]))
  {
    if(($_POST["Nombre"] != null) && ($_POST["Apellido"] != null) && ($_POST["Documento"] != null) && ($_POST["Email"] != null))
    {
      $ciudadano = new ciudadano(
        $_POST["Nombre"],
        $_POST["Apellido"],
        $_POST["Documento"],
        $_POST["Email"],
        True
      );

      $service->Add($ciudadano);
    }
    else{
      echo '<script>alert("Debe llenar todos los campos correctamente")</script>';
    }
    header("Location: ./index.php");
  }

?>

<?php topContent()?>

<div class="container">
  <form class="ms-1 border border-rounded" action="./operations/add.php" method="POST" enctype="multipart/form-data">
    <div class="modal-body">
    <div class="fw-bold">Editar ciudadano</div>
      <div class="ms-1">
        <div class="mb-3">
          <label for="txtNombre" class="form-label">Nombre</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="Nombre">
          </div>
        </div>
        <div class="mb-3">
          <label for="txtDocumento" class="form-label">Documento de identidad</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="Documento">
          </div>
        </div>
        <div class="md-3">
          <label for="txtApellido" class="form-label">Apellido</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="Apellido">
          </div>
        </div>
        <div class="md-3">
          <label for="txtEmail" class="form-label">Email</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="Email">
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