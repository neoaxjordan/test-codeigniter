<!DOCTYPE html>
<html lang="en">

<head>
  <title>CRUD ORDEN (ADD)</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .container { max-width: 500px; }
    .error { display: block; padding-top: 5px; font-size: 14px; color: red; }
  </style>
</head>
 
<body>
  <div class="container mt-5">
    <form method="post" id="add_data" name="add_data" action="http://localhost/codeigniter/public/submit">
      
    <div class="form-group">
        <label for="orden">Orden</label>
        <select id="orden" name="orden" class="form-control">
          <option value="" selected="selected" >-Seleccionar-</option>
          <option value="1">A</option>
          <option value="0">I</option>
        </select>
      </div>
      
      <div class="form-group">
        <label for="detalle">Detalle del Producto</label>
        <input id="detalle" type="text" name="detalle" class="form-control" />
      </div>
      
      <div class="form-group">
        <label for="cantidad">Cantidad</label>
        <input id="cantidad" type="text" name="cantidad" class="form-control" />
      </div>

      <div class="form-group">
        <label for="estado">Estado</label>
        <select id="estado" name="estado" class="form-control">
          <option value="" selected="selected" >-Seleccionar-</option>
          <option value="1">A</option>
          <option value="0">I</option>
        </select>
      </div>

      <div class="form-group">
        <input type="hidden" id="id" name="id" value="0">
        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    if ($("#add_data").length > 0) {
      $("#add_data").validate({
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