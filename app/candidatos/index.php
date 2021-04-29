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

  $service = new candidatosService();
  $utilities = new Utilities();

  $candidatos = $service->GetList();

?>

<?php topContent()?>

<div class="container">
  <div class="bg-light p-5 rounded">
    <h1>Candidatos</h1>
    <button type="button" class="btn btn-primary btn-lg">Agregar registro</button>
  </div>
</div>
<div class="py-5 mt-5 w-100 h-100 bg-light">
  <div class="container">
    <?php if(count($candidatos) < 1): ?>
      <h3 class="w-100 text-center">No hay registros de candidatos</h3>
    <?php else: ?>
      <div class="bg-white border border-secondary">
        <table class="table mb-0 shadow-sm">
          <thead class="table-dark rounded-top">
            <tr>
              <th scope="col" class="text-center" style="width: 15%;">ID</th>
              <th scope="col" style="width: 10%;">Monto</th>
              <th scope="col" style="width: 20%;">Fecha y Hora</th>
              <th scope="col" style="width: 35%;">Descripcion</th>
              <th scope="col" style="width: 20%;"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($candidatos as $key => $candidato): ?>
              <tr>
                <th scope="row"><?= $candidato->ID ?></th>
                <td>$<?= $candidato->Monto ?>.00</td>
                <td><?= $candidato->Fecha ?></td>
                <td><?= $candidato->Descripcion ?></td>
                <td>
                  <div class="btn-group border-start border-secondary ps-4 w-100">
                    <a href="./operations/edit.php?id=<?= $candidato->ID ?>" type="button" class="btn btn-sm btn-success w-50">Editar</a>
                    <button onclick="deleteItem('./delete.php?id=<?= $candidato->ID ?>')" type="button" class="btn btn-sm btn-danger w-50">Eliminar</button>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php bottomContent() ?>