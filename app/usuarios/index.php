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

$service = new ServiceFile("usuarios");
$servicePartidos = new ServiceFile("partidos");
$utilities = new Utilities();

$usuarios = $service->GetList();

?>

<?php topContent() ?>

<div class="container">
  <div class="bg-light p-5 rounded">
    <h1>Usuarios</h1>
    <a href="./add.php" type="button" class="btn btn-primary btn-lg">Agregar registro</a>
  </div>
</div>
<div class="py-5 mt-5 w-100 h-100 bg-light">
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 justify-content-around">
      <?php if (count($usuarios) < 1) : ?>
        <h3 class="w-100 text-center">No hay registros de usuarios</h3>
      <?php else : ?>
        <?php foreach ($usuarios as $key => $usuario) : ?>
          <div class="col" style="max-width: 400px; min-width: 200px;">
            <div class="card shadow-sm">
              <div class="card-header bg-dark text-light">
                <h5 class="card-title"><?= $usuario->Nombre ?> <?= $usuario->Apellido ?></h5>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Usuario <?= $servicePartidos->GetByID($usuario->Usuario) ?></li>
                <li class="list-group-item">Pertenece a <?= $servicePartidos->GetByID($usuario->Nombre) ?></li>
                <li class="list-group-item">
                  <?php if ($usuario->Estado == True) : ?>
                    <span class="text-success fw-bold">Activo</span>
                  <?php else : ?>
                    <span class="text-danger fw-bold">Inactivo</span>
                  <?php endif; ?>
                </li>
              </ul>
              <div class="card-body">
                <div class="btn-group">
                  <a href="./edit.php?id=<?= $usuario->ID ?>" type="button" class="btn btn-success">Editar</a>
                  <button onclick="deleteItem('./delete.php?id=<?= $usuario->ID ?>')" type="button" class="btn btn-danger">Eliminar</button>
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