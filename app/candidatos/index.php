<?php

  include './layout/_Layout.php';

?>

<?php topContent()?>

<div class="container">
  <div class="bg-light p-5 rounded">
    <h1>Candidatos</h1>
    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#Modal">Agregar registro</button>
  </div>
</div>
<div class="py-5 mt-5 w-100 h-100 bg-light">
  <div class="container">
    <?php if(count($transacciones) < 1): ?>
      <h3 class="w-100 text-center">No hay registros de transacciones</h3>
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
            <?php foreach($transacciones as $key => $transaccion): ?>
              <tr>
                <th scope="row"><?= $transaccion->ID ?></th>
                <td>$<?= $transaccion->Monto ?>.00</td>
                <td><?= $transaccion->Fecha ?></td>
                <td><?= $transaccion->Descripcion ?></td>
                <td>
                  <div class="btn-group border-start border-secondary ps-4 w-100">
                    <a href="./operations/edit.php?id=<?= $transaccion->ID ?>" type="button" class="btn btn-sm btn-success w-50">Editar</a>
                    <button onclick="deleteTransaccion('./operations/delete.php?id=<?= $transaccion->ID ?>')" type="button" class="btn btn-sm btn-danger w-50">Eliminar</button>
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