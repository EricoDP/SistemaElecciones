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
require_once '../../models/elecciones.php';

$service = new ServiceFile("elecciones");
$utilities = new Utilities();

$elecciones = $service->GetList();

?>

<?php topContent() ?>

<div class="container">
  <div class="bg-light p-5 rounded">
    <h1>elecciones</h1>
    <a href="./add.php" type="button" class="btn btn-primary btn-lg">Agregar registro</a>
  </div>
</div>
<div class="py-5 mt-5 w-100 h-100 bg-light">
  <div class="container">
    <?php if (count($elecciones) < 1) : ?>
      <h3 class="w-100 text-center">No hay registros de elecciones</h3>
    <?php else : ?>
      <?php foreach ($elecciones as $key => $eleccion) : ?>
        <div class="col" style="max-width: 400px; min-width: 200px;">
          <div class="card shadow-sm">
            <div class="card-header bg-dark text-light">
              <h5 class="card-title"><?= $eleccion->Nombre ?> <?= $eleccion->Apellido ?></h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Nombre <?= $eleccion->Nombre ?></li>
              <li class="list-group-item">
                <?php if ($eleccion->Status == 'Activo') : ?>
                  <span class="text-success fw-bold"><?= $eleccion->Status ?></span>
                <?php else : ?>
                  <span class="text-danger fw-bold"><?= $eleccion->Status ?></span>
                <?php endif; ?>
              </li>
            </ul>
            <div class="card-body">
              <div class="btn-group">
                <a href="./operations/edit.php?id=<?= $eleccion->ID ?>" type="button" class="btn btn-success">Editar</a>
                <button onclick="deleteItem('./delete.php?id=<?= $eleccion->ID ?>')" type="button" class="btn btn-danger">Eliminar</button>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>

<?php bottomContent() ?>