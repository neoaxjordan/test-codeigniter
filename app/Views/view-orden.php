<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>CRUD ORDEN</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
      <meta name="<?= csrf_token() ?>" content="<?= csrf_hash() ?>">
   </head>
   <body>

      <div class="container mt-4">

         <div class="d-flex justify-content-end">
            <span class="btn btn-success mb-2" data-toggle="modal" data-target="#myModal" onclick="fn_add();">Nuevo</span>
         </div>
         
      <div class="mt-3">
         <table class="table table-bordered" id="orden-list">
            <thead>
               <tr>
                  <th>Id</th>
                  <th>Orden</th>
                  <th>Detalle_Producto</th>
                  <th>Cantidad</th>
                  <th>Estado</th>
                  <th>Funciones</th>
               </tr>
            </thead>
            <tbody>
               <?php if($objetos): ?>
               <?php foreach($objetos as $o): ?>
               <tr>
                  <td><?php echo $o->id; ?></td>
                  <td><?php echo ($o->orden==1)?"A":"I"; ?></td>
                  <td><?php echo $o->producto_descripcion; ?></td>
                  <td><?php echo $o->cantidad; ?></td>
                  <td><?php echo ($o->estado==1)?"A":"I";; ?></td>
                  <td>
                     <span id="edit"  class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#myModal" onclick="fn_edit(<?php echo $o->id; ?>);">Editar</span>
                     <span id="eliminar"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModalDelete" onclick="fn_delete(<?php echo $o->id; ?>);">Eliminar</span>               
                  </td>
               </tr>
               <?php endforeach; ?>
               <?php endif; ?>
            </tbody>
         </table>
      </div>
      </div>

      <!-- Modal-Box Save -->
      <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title" id="myModalLabel">Modal Box</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
               </div>
               <div class="modal-body">
               
                  <form method="POST" id="form" action="" class="form-horizontal">
                  <div id="data" class="container mt-4">
                        
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
                              <input id="detalle" name="detalle" type="text" class="form-control" />
                              </div>
                              
                              <div class="form-group">
                              <label for="cantidad">Cantidad</label>
                              <input id="cantidad" name="cantidad" type="text" class="form-control" />
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
                                 <button id="btn-save" type="submit" class="btn btn-success btn-lg" >Guardar</button>
                                 <button id="btn-delete" type="submit" class="btn btn-danger btn-lg" >Eliminar</button>
                                 <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Salir</button>                        
                              </div>
                           </div>
                              
                     </div>
                  </form>

               </div>      
            </div>
         </div>
      </div>

      <!-- Modal Box Delete -->         
      <div id="myModalDelete" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content border-0">
                  <div class="modal-body p-0">
                     <div class="card border-0 p-sm-3 p-2 justify-content-center">
                           <div class="card-header pb-0 bg-white border-0 ">
                              <div class="row">
                                 <div class="col ml-auto"><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>
                              </div>
                              <p class="font-weight-bold mb-2"> Are you sure you wanna delete this ?</p>                             
                           </div>
                           <div class="card-body px-sm-4 mb-2 pt-1 pb-0">
                              <div class="row justify-content-end no-gutters">
                                 <div class="col-auto"><button type="button" class="btn btn-light text-muted" data-dismiss="modal">Cancel</button></div>
                                 <div class="col-auto"><button type="button" class="btn btn-danger px-4" data-dismiss="modal" onclick="drop();" >Delete</button></div>
                              </div>
                           </div>
                     </div>
                  </div>
               </div>
         </div>
      </div>


      <script src="https://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" 
               integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>     
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

   <script>
      $(document).ready( function () {
         $('#orden-list').DataTable();

         $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf_token_name"]').attr('content')
            }
         });

      });
      var save_method = 'null'; 
      var dropId = 0;

      function fn_add(){
         save_method = 'add';
         $(".modal-title").html("Nueva Orden");
         $("#btn-save").show();     
         $("#btn-delete").hide();
         $('#form')[0].reset();
         $('#myModal').modal('show');
      }
      function fn_edit(pid){
         save_method = 'edit';
         $(".modal-title").html("Editar Orden");
         $("#btn-save").show();
         $("#btn-delete").hide();

         // cargar datos
         $.ajax({
            url : "http://localhost/codeigniter/public/ajax/edit/" + pid,           
            method: "GET",
            dataType: "JSON",
            cache: false,            
            success: function(dataResult){              
               //console.log(dataResult);

               $("#id").val(dataResult.id);
               $("#orden").val(dataResult.orden);
               $("#detalle").val(dataResult.producto_descripcion);
               $("#cantidad").val(dataResult.cantidad);
               $("#estado").val(dataResult.estado); 
            }
         });

         $('#myModal').modal('show');
      }

      $(document).on('click', '#btn-save', function (e) {
         e.preventDefault();
     
         // guardar datos
         $.ajax({
            url : "http://localhost/codeigniter/public/ajax/save",           
            method: "POST",
            dataType: "JSON",
            cache: false,
            data: {
               'id': $('#id').val(),
               'orden': $('#orden').val(),
               'detalle': $('#detalle').val(),
               'cantidad': $('#cantidad').val(),
               'estado': $('#estado').val(),
               'bandera': save_method,
            },        
            success: function(dataResult){              
               console.log(dataResult);
               $('#myModal').modal('hide');
               // recargar tabla
               location.reload();
            }
         });
      });

      function fn_delete(pid){
         save_method = 'delete';
         $('#myModalDelete').modal('show');
         dropId = pid;         
      }
      function drop(){
         //alert(dropId);
         $.ajax({
               url : "http://localhost/codeigniter/public/ajax/delete/" + dropId,           
               method: "POST",
               dataType: "JSON",
               cache: false,              
               success: function(dataResult){              
                  console.log(dataResult);               
                  // recargar tabla
                  location.reload();
               }
            });
      }
      
   </script>
   </body>
</html>