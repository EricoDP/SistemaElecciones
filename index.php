<?php
include '../../layout/_Layout.php';
?>

<div class="container">
  <form class="ms-1 border border-rounded">
    <div class="modal-body">
      <div class="fw-bold">Ingrese sus datos para proceder a las elecciones</div>
      <div class="ms-1">
        <div class="mb-3">
          <label for="txtNombre" class="form-label">Nombre</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="Nombre">
          </div>
        </div>
        <div class="md-3">
          <label for="txtApellido" class="form-label">Apellido</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="Apellido">
          </div>
          <div class="mb-3">
            <label for="txtDocumento" class="form-label">Documento de identidad</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="Documento">
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>