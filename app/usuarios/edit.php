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
require_once '../../models/usuarios.php';

$utilities = new Utilities();
$service = new ServiceFile("usuarios");


<<<<<<< HEAD
if(isset($_POST["Nombre"]) && isset($_POST["Apellido"]) && isset($_POST["Partido_perteneceID"]) && isset($_POST["Partido_aspiraID"]) && isset($_FILES["Foto"]) && isset($_POST["Estado"]))
{
  if(($_POST["Nombre"] != null) && ($_POST["Apellido"] != null) && ($_POST["Partido_perteneceID"] != null) && ($_POST["Partido_aspiraID"] != null) && ($_FILES["Foto"] != null))
=======
if(isset($_POST["Nombre"]) && isset($_POST["Apellido"]) && isset($_POST["Email"]) && isset($_POST["Usuario"]) && isset($_POST["Password"]))
>>>>>>> 0100bbaef0ccb6ccb63867b6efa31544df09b794
  {
    if(($_POST["Nombre"] != null) && ($_POST["Apellido"] != null) && ($_POST["Email"] != null) && ($_POST["Usuario"] != null) && ($_POST["Password"] != null))
    {
    

    $usuario = new usuario(
      $_POST["Nombre"],
      $_POST["Apellido"],
      $_POST["Email"],
      $_POST["Usuario"],
      $_POST["Password"],
      $_POST["Estado"]
    );

    move_uploaded_file($imgname, $imgdestination);

    $service->Add($usuario);
  }
  else{
    echo '<script>alert("Debe llenar todos los campos correctamente")</script>';
  }
  header("Location: ./index.php");
}

?>

<?php topContent() ?>

<?php if ($usuario == null) : ?>
  <h3 class="w-100 text-center">No hay registro de esa transacion</h3>
<?php else : ?>
  <div class="container">
    <form class="ms-1 border border-rounded" action="./edit.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="fw-bold">Agregar usuario</div>
        <div class="ms-1">
          <div class="mb-3">
          <div class="container">
  <form class="ms-1 border border-rounded" action="./add.php" method="POST" enctype="multipart/form-data">
    <div class="modal-body">
      <div class="fw-bold">Agregar usuario</div>
      <div class="ms-1">
        <div class="mb-3">
          <label for="txtNombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" name="Nombre">
        </div>
        <div class="mb-3">
          <label for="txtApellido" class="form-label">Apellido</label>
          <input type="text" class="form-control" name="Apellido">
        </div>
        <div class="mb-3">
          <label for="txtEmail" class="form-label">Email</label>
          <input type="text" class="form-control" name="Email">
        </div>
        <div class="mb-3">
          <label for="txtUsuario" class="form-label">Usuario</label>
          <input type="text" class="form-control" name="Usuario">
        </div>
        <div class="mb-3">
          <label for="txtPassword" class="form-label">Password</label>
          <input type="password" class="form-control" name="Password">
        </div>
        <div class="mb-3">
            <label for="btnradio1" class="form-label">Status</label>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="Status" value="Activo" id="btnradio1" autocomplete="off"
              <?php if($usuario->Status == "Activo"): ?>checked<?php endif; ?>>
            <label class="btn btn-outline-primary" for="btnradio1">Activo</label>
            <input type="radio" class="btn-check" name="Status" id="btnradio2" value="Inactivo" autocomplete="off"
              <?php if($usuario->Status == "Inactivo"): ?>checked<?php endif; ?>>
            <label class="btn btn-outline-primary" for="btnradio2">Inactivo</label>
          </div>

      <div class="modal-footer">
        <a href="./index.php" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</a>
        <button type="submit" class="btn btn-primary">Editar</button>
      </div>
    </form>
  <?php endif; ?>
  </div>

  <?php bottomContent() ?>