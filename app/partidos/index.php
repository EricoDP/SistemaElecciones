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

$service = new ServiceFile("partidos");
$utilities = new Utilities();

$partidos = $service->GetList();

?>

<?php topContent() ?>

<div class="container">
  <div class="bg-light p-5 rounded">
    <h1>Partidos</h1>
    <a href="./add.php" type="button" class="btn btn-primary btn-lg">Agregar registro</a>
  </div>
</div>
<div class="py-5 mt-5 w-100 h-100 bg-light">
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 justify-content-around">
      <?php if (count($partidos) < 1) : ?>
        <h3 class="w-100 text-center">No hay registros de partidos</h3>
      <?php else : ?>
        <?php foreach ($partidos as $key => $partido) : ?>
          <div class="col" style="max-width: 400px; min-width: 200px;">
            <div class="card shadow-sm">
              <div class="card-header bg-dark text-light">
                <h5 class="card-title"><?= $partido->Nombre ?></h5>
              </div>
              <img src="../../assets/<?= $partido->Logo ?>" class="card-img-top" alt="..." style="height: 250px;">
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><?= $partido->Descripcion ?></li>
                <li class="list-group-item">
                  <?php if ($partido->Estado == True) : ?>
                    <span class="text-success fw-bold">Activo</span>
                  <?php else : ?>
                    <span class="text-danger fw-bold">Inactivo</span>
                  <?php endif; ?>
                </li>
              </ul>
              <div class="card-body">
                <div class="btn-group">
                  <a href="./edit.php?id=<?= $partido->ID ?>" type="button" class="btn btn-success">Editar</a>
                  <button onclick="deleteItem('./delete.php?id=<?= $partido->ID ?>')" type="button" class="btn btn-danger">Eliminar</button>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php bottomContent() ?>