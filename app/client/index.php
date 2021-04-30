<?php
include '../../layout/_ClientLayout.php';




?>

<?php topContent() ?>

<div class="container">
  <form class="bg-dark text-light border border-rounded" style="width: 700px; margin: auto;" action="./add.php" method="POST" enctype="multipart/form-data">
    <div class="container" style="margin: auto;">
    <h1>Ingresar</h1>
      <div class="mb-3">
        <label for="txtDocumento" class="form-label">Documento de Identidad</label>
        <input type="text" class="form-control" name="Documento">
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Ingresar</button>
      </div>
    </div>
  </form>
</div>

<?php bottomContent() ?>