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
require_once '../../models/puestos.php';

$service = new ServiceFile("puestos");
$utilities = new Utilities();

$puestos = $service->GetList();

?>

<?php topContent() ?>

<div class="container">
    <div class="bg-light p-5 rounded">
        <h1>puestos</h1>
        <a href="./add.php" type="button" class="btn btn-primary btn-lg">Agregar registro</a>
    </div>
</div>
<div class="py-5 mt-5 w-100 h-100 bg-light">
    <div class="container">
        <?php if (count($puestos) < 1) : ?>
            <h3 class="w-100 text-center">No hay registros de puestos</h3>
        <?php else : ?>
            <?php foreach ($puestos as $key => $puesto) : ?>
                <div class="col" style="max-width: 400px; min-width: 200px;">
                    <div class="card shadow-sm">
                        <div class="card-header bg-dark text-light">
                            <h5 class="card-title"><?= $puesto->Nombre ?></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?= $puesto->Descripcion ?></li>
                            <li class="list-group-item">
                                <?php if ($puesto->Status == true) : ?>
                                    <span class="text-success fw-bold">Activo</span>
                                <?php else : ?>
                                    <span class="text-danger fw-bold">Inactivo</span>
                                <?php endif; ?>
                            </li>
                        </ul>
                        <div class="card-body">
                            <div class="btn-group">
                                <a href="./puestos/edit.php?id=<?= $puesto->ID ?>" type="button" class="btn btn-success">Editar</a>
                                <button onclick="deleteItem('./delete.php?id=<?= $puesto->ID ?>')" type="button" class="btn btn-danger">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?php bottomContent() ?>