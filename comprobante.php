<?php
include_once('conexion.php');


/*porsiaka creo q despues escoger periodo se va a comprobante
 * if(isset($_SESSION['id_ges']))
{
    unset($_SESSION['id_ges']);
}*/

include_once('bar.php');


date_default_timezone_set('America/La_Paz');


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>

        button, input, optgroup, select, textarea {

            color: #000000;
        }


        .borde {
            border: 2px solid #a1a1a1;
            padding: 10px 40px;
            border-radius: 3px;
            width: 80%;

        }
        label{
            margin-bottom: 0px;
        }
        .form-group{
            margin-bottom: 2px;
        }
        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
            padding: 0;}
    </style>
  </head>
 <body>






 <div class="container-fluid" style="margin-left: 250px">

     <div class="btn-group-horizontal" style="position: relative;">
<!--         <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>-->
<!--         <button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>-->
<!--         <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>-->
    <button type="button" class="btn btn-" data-toggle="modal" data-target="#crea_com"><span class="glyphicon glyphicon-plus" aria-hidden="true" ></span></button>
         <button type="button" class="btn btn"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
         <button type="button" class="btn btn-"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
     </div>
     <div style="position: relative;" class="borde">
     <form id="static" class="" role="form" method="post" action="productoregister.php" enctype="multipart/form-data">
         <div class="container">
             <div class="row row-centered">
                 <div class="col-sm-3 col-lg-3 col-centered">
                     <!-- <div class="form-group">
             <label for="input6" class="col-md-4 control-label">123456789012:</label>
             <div class="col-md-8">
             <input type="text" class="form-control" id="input6" placeholder="input 6">
           </div>
         </div> -->

                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-sm-2 col-lg-2">
                 <div class="form-group">
                     <label for="serie">Serie:</label>
                     <input disabled type="text" class="form-control" id="serie">
                 </div>
             </div>
             <div class="col-sm-2 col-lg-6">
                 <div class="form-group">
                     <label for="tipo_comprobante">Tipo de Comprobante:</label>
                     <input disabled type="text" class="form-control" id="tipo_comprobante">
                 </div>
             </div>
             <div class="col-sm-2 col-lg-4">
                 <div class="form-group">
                     <label for="fecha">Fecha:</label>
                     <input disabled type="text" class="form-control" id="fecha">
                 </div>
             </div>
             </div>
             <div class="row">
                 <div class="col-sm-2 col-lg-12">
                     <div class="form-group">
                         <label for="glosa">Glosa:</label>
                         <input disabled type="text" class="form-control" id="glosa">
                     </div>
                 </div>

             </div>
             <div class="row">

                 <div class="col-sm-2 col-lg-3">
                     <div class="form-group">
                         <label for="tipo_cambio">Tipo de Cambio:</label>
                         <input disabled type="text" class="form-control" id="tipo_cambio">
                     </div>
                 </div>
                 <div class="col-sm-2 col-lg-5">
                     <div class="form-group">
                         <label for="moneda">Moneda:</label>
                         <input disabled type="text" class="form-control" id="moneda">
                     </div>
                 </div>
                 <div class="col-sm-2 col-lg-4">
                     <div class="form-group">
                         <label for="estado">Estado:</label>
                         <input disabled type="text" class="form-control" id="estado">
                     </div>
                 </div>

             </div>

         <!-- /.row this actually does not appear to be needed with the form-horizontal -->

     </form>

         <div class="row">
             <div class='wrapper text-center'>
         <div class="btn-group btn-group-lg" role="group" aria-label="...">
             <button name="first1" id="first" type="button" class="btn btn-default" style="    height: 40px;">
                 <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                 <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
             </button>
             <button name="be" id="be" type="button" class="btn btn-default"> <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span></button>
             <button name="af" id="af" type="button" class="btn btn-default"> <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></button>
             <button name="last" id="last" type="button" class="btn btn-default" style="    height: 40px;">
                 <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                 <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
             </button>

         </div>
                 <div class="btn-group btn-group-lg pull-right" role="group" aria-label="...">
                 <button name="" type="button" class="btn btn-default pull-right"> <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>

             </div>
             </div>

         </div>
 </div>
     <div class="btn-group-horizontal" style="position: relative;">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_det"><span class="glyphicon glyphicon-plus" aria-hidden="true" ></span></button>

     </div>
     <div style="position: relative;" class="borde">


         <div class="row">
             <div class='wrapper text-center'>

             </div>

                     <table class="table table-bordered">
                         <thead>
                         <tr>
                             <th>Codigo</th>
                             <th>Cuenta</th>
                             <th width="250px">Glosa</th>
                             <th width="70px">Debe</th>
                             <th width="70px">Haber</th>
                             <th width="70px">Eliminar</th>
                         </tr>
                         </thead>
                         <tbody>
                         </tbody>
                     </table>

                     <ul id="pagination" class="pagination-sm"></ul>
                 </div>

     </div>
 </div>
  <div class="modal fade" id="crea_com" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <h4 class="modal-title" id="myModalLabel">Create Item</h4>
              </div>

              <div class="modal-body">
                  <form id = "compro" class="" role="form" method="post" action="comprobante_crear.php" enctype="multipart/form-data">
                      <div class="container">
                          <div class="row row-centered">
                              <div class="col-sm-3 col-lg-3 col-centered">
                                  <!-- <div class="form-group">
                          <label for="input6" class="col-md-4 control-label">123456789012:</label>
                          <div class="col-md-8">
                          <input type="text" class="form-control" id="input6" placeholder="input 6">
                        </div>
                      </div> -->

                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-2 col-lg-2">
                              <div class="form-group">
                                  <label for="serie">Serie:</label>
                                  <input  type="text" class="form-control" id="serie" name="serie">
                              </div>
                          </div>
                          <div class="col-sm-2 col-lg-6">
                              <div class="form-group">
                                  <label for="tipo_comprobante">Tipo de Comprobante:</label>
                                  <input  type="text" class="form-control" id="tipo_comprobante" name="tipo_comprobante">
                              </div>
                          </div>
                          <div class="col-sm-2 col-lg-4">
                              <div class="form-group">
                                  <label for="fecha">Fecha:</label>
                                  <input  type="text" class="form-control" id="fecha" name="fecha">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-2 col-lg-12">
                              <div class="form-group">
                                  <label for="glosa">Glosa:</label>
                                  <input  type="text" class="form-control" id="glosa" name="glosa">
                              </div>
                          </div>

                      </div>
                      <div class="row">

                          <div class="col-sm-2 col-lg-3">
                              <div class="form-group">
                                  <label for="tipo_cambio">Tipo de Cambio:</label>
                                  <input  type="text" class="form-control" id="tipo_cambio" name="tipo_cambio">
                              </div>
                          </div>
                          <div class="col-sm-2 col-lg-5">
                              <div class="form-group">
                                  <label for="moneda">Moneda:</label>
                                  <input  type="text" class="form-control" id="moneda" name="moneda">
                              </div>
                          </div>
                          <div class="col-sm-2 col-lg-4">
                              <div class="form-group">
                                  <label for="estado">Estado:</label>
                                  <input  type="text" class="form-control" id="estado" name="estado">
                              </div>
                          </div>

                      </div>

                      <!-- /.row this actually does not appear to be needed with the form-horizontal -->
                      <button type="submit" class="btn crud-submit btn-success crea">Agregar</button>
                  </form>

              </div>
          </div>

      </div>
  </div>
  <div class="modal fade" id="add_det" tabindex="-1" role="dialog" aria-labelledby="myModalLabl">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <h4 class="modal-title" id="myModalLabel">Create Item</h4>
              </div>

              <div class="modal-body">
                  <form data-toggle="validator" action="api/create.php" method="POST">

                      <div class="form-group">
                          <label class="control-label" for="title">Title:</label>
                          <input type="text" name="title" class="form-control" data-error="Please enter title." required />
                          <div class="help-block with-errors"></div>
                      </div>

                      <div class="form-group">
                          <label class="control-label" for="title">Description:</label>
                          <textarea name="description" class="form-control" data-error="Please enter description." required></textarea>
                          <div class="help-block with-errors"></div>
                      </div>

                      <div class="form-group">
                          <button type="submit" class="btn crud-submit btn-success ">Agregar</button>
                      </div>

                  </form>

              </div>
          </div>

      </div>
  </div>
     <script language="javascript">
         $(document).ready(function () {


            capturar_com();
             $("#af").click( function()
                 {
                     updateResult();
                 }
             );
             $("#be").click( function()
                 {
                     downResult();
                 }
             );
             $("#first").click( function()
                 {
                     capturar_com();
                 }
             ); $("#last").click( function()
                 {
                     upResult();
                 }
             );
             $(".crea").click(function(e){
                 agregar();
         });
         });

         function agregar(){
             e.preventDefault();
             var datastring = $("#compro").serialize();
             var form_action = $("#crea_com").find("form").attr("action");
             var serie = $("#crea_com").find("input[id='serie']").val();
             var fecha = $("#crea_com").find("input[id='fecha']").val();
             var glosa = $("#crea_com").find("input[id='glosa']").val();
             var tipo_comprobante = $("#crea_com").find("input[id='tipo_comprobante']").val();
             var tipo_cambio = $("#crea_com").find("input[id='tipo_cambio']").val();
             var moneda = $("#crea_com").find("input[id='moneda']").val();
             var estado = $("#crea_com").find("input[id='estado']").val();

             tipo_cambio
             var title = $("#create-item").find("input[name='title']").val();
             var description = $("#create-item").find("textarea[name='description']").val();

             if(title != '' && description != ''){
                 $.ajax({
                     dataType: 'json',
                     type:'POST',
                     url:  form_action,
                     cache: false,
                     data:
                         datastring,

                 }).done(function(data){


                     $("#static").find("input[id='serie']").val(data.serie);
                     $("#static").find("input[id='fecha']").val(data.fecha);
                     $("#static").find("input[id='glosa']").val(data.glosa);
                      $("#static").find("input[id='tipo_comprobante']").val(data.tipocom);
                     $("#static").find("input[id='tipo_cambio']").val(data.cambio);
                      $("#static").find("input[id='moneda']").val(data.moneda);
                      $("#static").find("input[id='estado']").val(data.estado);


                     getPageData();
                     $(".modal").modal('hide');

                 });
             }else{
                 alert('Error')
             }


         };

         function updateResult(){
//             var f = $('#serie').val();
             var f = parseInt($('#serie').val());
f=f+1;

             if(f>0)
             {


                 $.ajax({
                     type: "POST",
                     url: "comproc.php",
                     data: 'dato='+f,
                     dataType: "json",
                     cache: false,
                     success: function(data){
                         $("#serie").val(data['serie']);
                         $("#fecha").val(data['fecha']);
                         $("#glosa").val(data['glosa']);
                         $("#tipo_comprobante").val(data['tipocom']);
                         $("#tipo_cambio").val(data['cambio']);
                         $("#moneda").val(data['moneda']);
                         $("#estado").val(data['estado']);
                         detalle(data['id']);

                     }
                 });
             }
         }

         function upResult(){
                var data;
             $.ajax({
                 dataType: "json",
                 url: 'comprob.php',
                 data: data,
                 success: function (data) {

                     $("#serie").val(data['serie']);
                     $("#fecha").val(data['fecha']);
                     $("#glosa").val(data['glosa']);
                     $("#tipo_comprobante").val(data['tipocom']);
                     $("#tipo_cambio").val(data['cambio']);
                     $("#moneda").val(data['moneda']);
                     $("#estado").val(data['estado']);

                     detalle2(data['id']);

                 }
             });
         }
         function downResult(){
//             var f = $('#serie').val();
             var f = parseInt($('#serie').val());
             f=f-1;

             if(f>0)
             {


                 $.ajax({
                     type: "POST",
                     url: "comproc.php",
                     data: 'dato='+f,
                     dataType: "json",
                     cache: false,
                     success: function(data){
                         $("#serie").val(data['serie']);
                         $("#fecha").val(data['fecha']);
                         $("#glosa").val(data['glosa']);
                         $("#tipo_comprobante").val(data['tipocom']);
                         $("#tipo_cambio").val(data['cambio']);
                         $("#moneda").val(data['moneda']);
                         $("#estado").val(data['estado']);
                         detalle3(data['id']);

                     }
                 });
             }
         }



         function capturar_com() {
             var data;
             var yo;
             $.ajax({
                 dataType: "json",
                 url: 'comprobanteregister.php',
                 data: data,
                 success: function (data) {


                     $("#serie").val(data['serie']);
                     $("#fecha").val(data['fecha']);
                     $("#glosa").val(data['glosa']);
                     $("#tipo_comprobante").val(data['tipocom']);
                     $("#tipo_cambio").val(data['cambio']);
                     $("#moneda").val(data['moneda']);
                     $("#estado").val(data['estado']);
                     detalle4(data['id']);


                 }
             });


         }
         function detalle(a) {
             $.ajax({
                 type: "POST",
                 dataType: "json",
                 url: 'detalle_get.php',
                 data: 'dato=' + a,
                 cache: false,
                 beforeSend: function(){
                     jQuery('tbody').html('');

                 },

                 success: function (yo) {
                     manageRow(yo.data);


                 }
             });
         }
         function detalle2(a) {
             $.ajax({
                 type: "POST",
                 dataType: "json",
                 url: 'detalle_get2.php',
                 data: 'dato=' + a,
                 cache: false,
                 beforeSend: function(){
                     jQuery('tbody').html('');

                 },
                 success: function (yo) {
                     manageRow2(yo.data);


                 }
             });
         }
         function detalle3(a) {
             $.ajax({
                 type: "POST",
                 dataType: "json",
                 url: 'detalle_get3.php',
                 data: 'dato=' + a,
                 cache: false,
                 beforeSend: function(){
                     jQuery('tbody').html('');

                 },
                 success: function (yo) {
                     manageRow3(yo.data);


                 }
             });
         }
         function detalle4(a) {
             $.ajax({
                 type: "POST",
                 dataType: "json",
                 url: 'detalle_get4.php',
                 data: 'dato=' + a,
                 cache: false,
                 beforeSend: function(){
                     jQuery('tbody').html('');

                 },
                 success: function (yo) {
                     manageRow4(yo.data);


                 }
             });
         }
         function manageRow(data) {
             var	rows = '';
             $.each( data, function( key, value ) {
                 rows = rows + '<tr>';
                 rows = rows + '<td>'+value.codigo+'</td>';
                 rows = rows + '<td>'+value.text+'</td>';
                 rows = rows + '<td>'+value.glosa+'</td>';
                 rows = rows + '<td>'+value.debe+'</td>';
                 rows = rows + '<td>'+value.haber+'</td>';

                 rows = rows + '<td data-id="'+value.id+'">';

                 rows = rows + '<button class="btn btn-danger remove-item">Delete</button>';
                 rows = rows + '</td>';
                 rows = rows + '</tr>';
             });

             $("tbody").html(rows);

         }
         function manageRow2(data) {
             var	rows = '';
             $.each( data, function( key, value ) {
                 rows = rows + '<tr>';
                 rows = rows + '<td>'+value.codigo+'</td>';
                 rows = rows + '<td>'+value.text+'</td>';
                 rows = rows + '<td>'+value.glosa+'</td>';
                 rows = rows + '<td>'+value.debe+'</td>';
                 rows = rows + '<td>'+value.haber+'</td>';

                 rows = rows + '<td data-id="'+value.id+'">';

                 rows = rows + '<button class="btn btn-danger remove-item">Delete</button>';
                 rows = rows + '</td>';
                 rows = rows + '</tr>';
             });

             $("tbody").html(rows);
         }
         function manageRow3(data) {
             var	rows = '';
             $.each( data, function( key, value ) {
                 rows = rows + '<tr>';
                 rows = rows + '<td>'+value.codigo+'</td>';
                 rows = rows + '<td>'+value.text+'</td>';
                 rows = rows + '<td>'+value.glosa+'</td>';
                 rows = rows + '<td>'+value.debe+'</td>';
                 rows = rows + '<td>'+value.haber+'</td>';

                 rows = rows + '<td data-id="'+value.id+'">';

                 rows = rows + '<button class="btn btn-danger remove-item">Delete</button>';
                 rows = rows + '</td>';
                 rows = rows + '</tr>';
             });

             $("tbody").html(rows);

         }
         function manageRow4(data) {
             var	rows = '';
             $.each( data, function( key, value ) {
                 rows = rows + '<tr>';
                 rows = rows + '<td>'+value.codigo+'</td>';
                 rows = rows + '<td>'+value.text+'</td>';
                 rows = rows + '<td>'+value.glosa+'</td>';
                 rows = rows + '<td>'+value.debe+'</td>';
                 rows = rows + '<td>'+value.haber+'</td>';

                 rows = rows + '<td data-id="'+value.id+'">';

                 rows = rows + '<button class="btn btn-danger remove-item">Delete</button>';
                 rows = rows + '</td>';
                 rows = rows + '</tr>';
             });

             $("tbody").html(rows);

         }
         $("body").on("click",".remove-item",function(){
             var id = $(this).parent("td").data('id');
             var c_obj = $(this).parents("tr");

             $.ajax({
                 dataType: 'json',
                 type:'POST',
                 url:  'api/delete.php',
                 data:{id:id}
             }).done(function(data){
                 c_obj.remove();
                 toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});
                 getPageData();
             });

         });
     </script></body>

</html>
