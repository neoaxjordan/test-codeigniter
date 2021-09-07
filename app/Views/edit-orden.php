<!DOCTYPE html>
<html>

<head>
  <title>Codeigniter 4 CRUD - Edit User Demo</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .container { max-width: 500px; }
    .error { display: block; padding-top: 5px; font-size: 14px; color: red; }
  </style>
</head>

<body>
  <div class="container mt-5">
    <form method="post" id="update_data" name="update_data" action="http://localhost/codeigniter/public/update">
      <input type="hidden" name="id" id="id" value="<?php echo $objeto->id; ?>">

      <div class="form-group">
        <label>Orden</label>
        <select id="orden" name="orden" class="form-control">
          <option value="" >-Seleccionar-</option>
          <option value="1" selected="<?php echo ($objeto->orden_id==1) ? "selected" : "" ; ?>" >Activo</option>
          <option value="0" selected="<?php echo ($objeto->orden_id==0) ? "selected" : "" ; ?>" >Inactivo</option>
        </select>
      </div>

      <div class="form-group">
        <label for="detalle">Detalle del Producto</label>
        <input id="detalle" type="text" name="detalle" class="form-control" value="<?php echo $objeto->producto_descripcion; ?>" />
      </div>
      
      <div class="form-group">
        <label for="cantidad">Cantidad</label>
        <input id="cantidad" type="text" name="cantidad" class="form-control" value="<?php echo $objeto->cantidad; ?>"/>
      </div>

      <div class="form-group">
        <label for="estado">Estado</label>
        <select id="estado" name="estado" class="form-control">
          <option value="" >-Seleccionar-</option>
          <option value="1" selected="<?php echo ($objeto->estado==1) ? "selected" : "" ; ?>" >Activo</option>
          <option value="0" selected="<?php echo ($objeto->estado==0) ? "selected" : "" ; ?>">Inactivo</option>
        </select>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Save Data</button>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    if ($("#update_data").length > 0) {
      $("#update_data").validate({
        rules: {
          orden: {
            required: true,
          },
          detalle: {
            required: true,
          },
          cantidad: {
            required: true,
            maxlength: 3,
          },
          estado: {
            required: true,
          },
        },
        messages: {
          orden: {
            required: "Orden is required.",
          },
          detalle: {
            required: "Detalle is required.",
          },
          cantidad: {
            required: "Cantidad is required.",
            maxlength: "Cantidad should be or equal to 3 chars.",
          },
          estado: {
            required: "Estado is required.",
          },
        },
      })
    }
  </script>
</body>

</html>