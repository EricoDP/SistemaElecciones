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

$service = new ServiceFile("candidatos");
$servicePartidos = new ServiceFile("partidos");
$utilities = new Utilities();

$candidatos = $service->GetList();

?>

<?php topContent() ?>

<div class="container">
  <div class="bg-light p-5 rounded">
    <h1>Candidatos</h1>
    <a href="./add.php" type="button" class="btn btn-primary btn-lg">Agregar registro</a>
  </div>
</div>
<div class="py-5 mt-5 w-100 h-100 bg-light">
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 justify-content-around">
      <?php if (count($candidatos) < 1) : ?>
        <h3 class="w-100 text-center">No hay registros de candidatos</h3>
      <?php else : ?>
        <?php foreach ($candidatos as $key => $candidato) : ?>
          <div class="col" style="max-width: 400px; min-width: 200px;">
            <div class="card shadow-sm">
              <div class="card-header bg-dark text-light">
                <h5 class="card-title"><?= $candidato->Nombre ?> <?= $candidato->Apellido ?></h5>
              </div>
              <img src="../../assets/<?= $candidato->Foto ?>" class="card-img-top" alt="..." style="height: 250px;">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Pertenece a <?= $servicePartidos->GetByID($candidato->Partido_pertenece)->Nombre ?></li>
                <li class="list-group-item">Aspira a <?= $servicePartidos->GetByID($candidato->Partido_aspira)->Nombre ?></li>
                <li class="list-group-item">
                  <?php if ($candidato->Estado == True) : ?>
                    <span class="text-success fw-bold">Activo</span>
                  <?php else : ?>
                    <span class="text-danger fw-bold">Inactivo</span>
                  <?php endif; ?>
                </li>
              </ul>
              <div class="card-body">
                <div class="btn-group">
                  <a href="./edit.php?id=<?= $candidato->ID ?>" type="button" class="btn btn-success">Editar</a>
                  <button onclick="deleteItem('./delete.php?id=<?= $candidato->ID ?>')" type="button" class="btn btn-danger">Eliminar</button>
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