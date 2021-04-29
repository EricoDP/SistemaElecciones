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

  $service = new candidatosService("../");

?>

<?php topContent()?>

<div class="container">
  <form class="ms-1 border border-rounded" action="./operations/add.php" method="POST" enctype="multipart/form-data">
    <div class="modal-body">
      <div class="fw-bold">Añadir partido</div>
      <div class="ms-1">
        <div class="mb-3">
          <label for="txtPartido" class="form-label">Partido</label>
          <div class="input-group mb-3">
            <span class="input-group-text">.</span>
            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="Partido">
            <span class="input-group-text">.</span>
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