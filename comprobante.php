<?php
include_once('conexion.php');
include_once('bar.php');

//El numero del comprobante debe ser correlatido por Empresa
//Cuando se crea el estado es Abierto
//Posibles Estados : "Abierto", "Cerrado" y "Anulado"
//La fecha tiene que pertenecer a un periodo Abierto
//Solo puedo colocar las cuentas de Detalle (las de ultimo nivel)
//Deberia poderse buscar las cuentas a travez de un autocompletar
//Si coloco un monto en el "Debe", no podre colocar otro el el "Haber" para el mismo detalle ni viceversa
//La suma de todos los "Debe" debe ser igual a la suma de todos los "Haber", caso contrario no debe dejar grabar el comprobante.
//Solo puedo insertar una cuenta a la vez en el detalle.
//Se debe validar los datos según los campos de la base de datos.
//Los tipos de comprobantes serán: "Ingreso", "Egreso", "Traspaso", "Apertura" y "Ajuste"
//Solo puede haber un comprobante de apertura en una gestión
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
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0;
        }
        .ui-autocomplete
        {
            z-index: 8000; /
        }
    </style>
      <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
      <link rel="stylesheet" href="css/bootstrap-select.min.css">
      <link rel="stylesheet" href="css/alertify.min.css">
      <link rel="stylesheet" href="css/default.min.css">
  </head>
 <body>






 <div class="container-fluid" style="margin-left: 250px">

     <div class="btn-group-horizontal" style="position: relative;">
<!--         <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>-->
<!--         <button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>-->
<!--         <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>-->
<!--    <button type="button" class="btn btn-" data-toggle="modal" data-target="#crea_com"><span class="glyphicon glyphicon-plus" aria-hidden="true" ></span></button>-->
    <button type="button" id="nuevo_com" class="btn btn-" ><span class="glyphicon glyphicon-plus" aria-hidden="true" ></span></button>
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
             <div id="div_tipoin" class="col-sm-2 col-lg-6">
                 <div class="form-group">
                     <label for="tipo_comprobante">Tipo de Comprobante:</label>
                     <input disabled type="text" class="form-control" id="tipo_comprobante" name="">
                 </div>
             </div>
             <div id="div_tipose" class="col-sm-2 col-lg-6">
                 <div class="form-group">
                     <label for="tipo_compro">Tipo de Comprobante:</label>
                     <select class="form-control selectpicker show-menu-arrow show-tick" data-dropup-auto="false" name="tipo_compro" id="tipo_compro" placeholder="Tipo Comprobante">

                     <?php

                     $cxn = new mysqli($mysql_host, $mysql_user, $mysql_password, $my_database);
                     $cxn->set_charset("utf8");
                     $result = $cxn->query("SELECT * from concepto where id >=6 and id <= 10");
                     while($row = $result->fetch_assoc())



                         echo '<option value="'.$row['id'].'">'.$row['descripcion'].'</option>';


                     $cxn->close();

                     ?>

                     </select>
                 </div>
             </div>
             <div class="col-sm-2 col-lg-4">
                 <div class="form-group">
                     <label for="fecha">Fecha:</label>
                     <input disabled type="text" class="form-control datepicker" id="fecha">
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

                 <div id="div_cambioin" class="col-sm-2 col-lg-3">
                     <div class="form-group">
                         <label for="tipo_cambio">Tipo de Cambio:</label>
                         <input disabled type="text" class="form-control" id="tipo_cambio">
                     </div>
                 </div>
                 <div id="div_cambiose" class="col-sm-2 col-lg-3">
                     <div class="form-group">
                         <label for="tipo_cam">Tipo de Cambio:</label>

                         <select class="form-control selectpicker show-menu-arrow show-tick" data-dropup-auto="false" name="tipo_cam" id="tipo_cam" placeholder="Csmbio">

                             <?php

                             $cxn = new mysqli($mysql_host, $mysql_user, $mysql_password, $my_database);
                             $cxn->set_charset("utf8");
                             $result = $cxn->query("SELECT * from tipo_cambio where activo=1");
                             while($row = $result->fetch_assoc())



                                 echo '<option value="'.$row['id'].'">'.$row['cambio'].'</option>';


                             $cxn->close();

                             ?>

                         </select>
                     </div>
                 </div>
                 <div id="div_monedain" class="col-sm-2 col-lg-5">
                     <div class="form-group">
                         <label for="moneda">Moneda:</label>
                         <input disabled type="text" class="form-control" id="moneda">
                     </div>
                 </div>
                 <div id="div_monedase" class="col-sm-2 col-lg-5">
                     <div class="form-group">
                         <label for="mone">Moneda:</label>

                         <select class="form-control selectpicker show-menu-arrow show-tick" data-dropup-auto="false" name="mone" id="mone" placeholder="Moneda">

                             <?php

                             $cxn = new mysqli($mysql_host, $mysql_user, $mysql_password, $my_database);
                             $cxn->set_charset("utf8");
                             $result = $cxn->query("SELECT * from concepto where id >=1 and id <= 2");
                             while($row = $result->fetch_assoc())



                                 echo '<option value="'.$row['id'].'">'.$row['descripcion'].'</option>';


                             $cxn->close();

                             ?>

                         </select>
                     </div>
                 </div>
                 <div id="div_estadoin" class="col-sm-2 col-lg-4">
                     <div class="form-group">
                         <label for="estado">Estado:</label>
                         <input disabled type="text" class="form-control" id="estado">
                     </div>
                 </div>
                 <div id="div_estadose" class="col-sm-2 col-lg-4">
                     <div class="form-group">
                         <label for="esta">Estado:</label>

                         <select class="form-control selectpicker show-menu-arrow show-tick" data-dropup-auto="false" name="esta" id="esta" placeholder="Estado">

                             <?php

                             $cxn = new mysqli($mysql_host, $mysql_user, $mysql_password, $my_database);
                             $cxn->set_charset("utf8");
                             $result = $cxn->query("SELECT * from concepto where id >=3 and id <= 5");
                             while($row = $result->fetch_assoc())



                                 echo '<option value="'.$row['id'].'">'.$row['descripcion'].'</option>';


                             $cxn->close();

                             ?>

                         </select>
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
                 <div class="col-xs-2 pull-right">
                     <div class="input-group">
                         <input type="number" id="buscar_serie" class="form-control" placeholder="Buscar por serie">
                         <span class="input-group-btn">
        <button class="btn btn-default" id="buscar" type="button">Ir</button>
      </span>
                     </div><!-- /input-group -->
                 </div><!-- /.col-lg-6 -->
<!--                 <div class="btn-group btn-group-lg pull-right" role="group" aria-label="...">-->
<!--                 <button name="" type="button" class="btn btn-default pull-right"> <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>-->
<!---->
<!--             </div>-->
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
                                  <input  type="text" class="form-control " id="fecha" name="fecha">
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
                  <form data-toggle="validator" >

                      <div class="form-group">
                          <label class="control-label" for="cuenta_cod">Cuenta:</label>
                          <input type="text" name="cuenta_cod" id="cuenta_cod" class="form-control"  />
                          <div class="help-block with-errors"></div>
                          <label id="selectID"></label>
                      </div>

                      <div class="form-group">
                          <label class="control-label" for="glosa_detalle">Glosa:</label>
                          <input name="glosa_detalle" id="glosa_detalle" class="form-control" ></input>
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
            ocultar_div();
             $("#buscar").click( function()
                 {
                     buscar();
                 }
             );
             $("#nuevo_com").click( function()
                 {
                     nuevo();
                 }
             );
             $("#af").click( function()
                 {
                     updateResult();
                     disable();
                 }
             );
             $("#be").click( function()
                 {
                     downResult();
                     disable();
                 }
             );
             $("#first").click( function()
                 {
                     capturar_com();
                     disable();
                 }
             ); $("#last").click( function()
                 {
                     upResult();
                     disable();
                 }
             );
             $(".crea").click(function(e){
                 agregar();
         });
         });
         function ocultar_div(){
             $("#div_tipose").hide();
             $("#div_monedase").hide();
             $("#div_estadose").hide();
             $("#div_cambiose").hide();

         }function mostrar_div(){
             $("#div_tipose").show();
             $("#div_monedase").show();
             $("#div_estadose").show();
             $("#div_cambiose").show();
             ocultar_input();

         }
         function mostrar_input(){
             $("#div_tipoin").show();
             $("#div_monedain").show();
             $("#div_estadoin").show();
             $("#div_cambioin").show();

         }
         function ocultar_input(){
             $("#div_tipoin").hide();
             $("#div_monedain").hide();
             $("#div_estadoin").hide();
             $("#div_cambioin").hide();

         }
         function buscar(){
//             var f = $('#serie').val();
             var f = parseInt($('#buscar_serie').val());


             if(f>0)
             {


                 $.ajax({
                     type: "POST",
                     url: "buscar_serie.php",
                     data: 'dato='+f,
                     dataType: "json",
                     cache: false,
                     success: function(data){

                         if(data['result']=='1') {
                             $("#serie").val(data['serie']);
                             $("#fecha").val(data['fecha']);
                             $("#glosa").val(data['glosa']);
                             $("#tipo_comprobante").val(data['tipocom']);
                             $("#tipo_cambio").val(data['cambio']);
                             $("#moneda").val(data['moneda']);
                             $("#estado").val(data['estado']);
                             detalle(data['id']);
                         }else
                         {
                             alertify.set('notifier', 'position', 'top-right');
                             alertify.error('Serie no encontrada');


                         }
                     },
                     error: function(){

                     }
                 });
             }else{
                 alertify.set('notifier', 'position', 'top-right');
                 alertify.error('Ingrese un número válido');

             }

         }
         function disable(){
             $("#static").find("input[id='fecha']").prop('disabled', true);
             $("#static").find("input[id='glosa']").prop('disabled', true);
             ocultar_div();
             mostrar_input();

         }
         function nuevo(){
             $("#static").find("input[id='serie']").val("");
             $("#static").find("input[id='fecha']").val("");
             $("#static").find("input[id='glosa']").val("");
            mostrar_div();

             $("#static").find("input[id='fecha']").prop('disabled', false);
             $("#static").find("input[id='glosa']").prop('disabled', false);


                 $.ajax({
                     dataType: 'json',
                     type:'POST',
                     url:  'serie_get.php',
                     cache: false



                 }).done(function(data){


                     $("#static").find("input[id='serie']").val(data);


                 });



         };
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
     </script>

 <!-- Autocomplete Multiple Values from Different Cources -->
<!-- <script>-->
<!--     $(function() {-->
<!--         function split( val ) {-->
<!--             return val.split( /,\s*/ );-->
<!--         }-->
<!--         function extractLast( term ) {-->
<!--             return split( term ).pop();-->
<!--         }-->
<!---->
<!--         $( "#cuenta_cod" ).bind( "keydown", function( event ) {-->
<!--             if ( event.keyCode === $.ui.keyCode.TAB &&-->
<!--                 $( this ).autocomplete( "instance" ).menu.active ) {-->
<!--                 event.preventDefault();-->
<!--             }-->
<!--         })-->
<!--             .autocomplete({-->
<!--                 minLength: 1,-->
<!--                 source: function( request, response ) {-->
<!--                     var terms = split( request.term );-->
<!--                     if (terms.length < 2) {-->
<!--                         $.getJSON("text_cuenta.php", { term : extractLast( request.term )},response);-->
<!--                     }else{-->
<!--                         $.getJSON("cod_cuenta.php", { term : extractLast( request.term )},response);-->
<!--                     }-->
<!--                 },-->
<!--                 focus: function() {-->
<!--                     // prevent value inserted on focus-->
<!--                     return false;-->
<!--                 },-->
<!--                 select: function( event, ui ) {-->
<!--                     var terms = split( this.value );-->
<!--                     // remove the current input-->
<!--                     terms.pop();-->
<!--                     // add the selected item-->
<!--                     terms.push( ui.item.value );-->
<!--                     // add placeholder to get the comma-and-space at the end-->
<!--                     terms.push( "" );-->
<!--                     this.value = terms.join( ", " );-->
<!--                     return false;-->
<!--                 }-->
<!--             });-->
<!--     });-->
<!-- </script>-->

 <?php
 $dbHost = 'localhost';
 $dbUsername = 'root';
 $dbPassword = '';
 $dbName = 'n';

 //connect with the database
 $db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

 //get search term


 //get matched data from skills table
 $query = $db->query("SELECT * FROM cuenta  ");
 $data = array();
 while ($row = $query->fetch_assoc()) {

     array_push($data, array('label'=> $row['codigo']." - ".$row['text'], 'value' => $row['codigo']." - ".$row['text'], 'id'=>$row['id']));
 }
 ?>
 <script>

     $(function() {
         var req =  <?php echo json_encode($data); ?>;
         $('#cuenta_cod').autocomplete({
             source: req,
             change: function (event, ui) {


                 $("#selectID").html(ui.item.id);
                 return false;
             } });
     });

 </script>

 <script> //date picker js
     $(document).ready(function() {
         $('.datepicker').datepicker({
             todayHighlight: true,
             "autoclose": true,
             format: 'dd-mm-yyyy'
         });
     });
 </script>
 <script type="text/javascript" src="js/alertify.min.js"></script>
 <script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>
 </body>

</html>
