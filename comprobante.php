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
    </style>
  </head>
 <body>




 </body>

 <div class="container-fluid" style="margin-left: 250px">
     <div class="text-center">
         <h5>Comprobante</h5>

     </div>
     <div class="btn-group-horizontal" style="position: relative;">
<!--         <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>-->
<!--         <button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>-->
<!--         <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>-->
    <button type="button" class="btn btn-"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
         <button type="button" class="btn btn"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
         <button type="button" class="btn btn-"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
     </div>
     <div style="position: relative;" class="borde">
     <form class="" role="form" method="post" action="productoregister.php" enctype="multipart/form-data">
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
                     <input type="text" class="form-control" id="serie">
                 </div>
             </div>
             <div class="col-sm-2 col-lg-6">
                 <div class="form-group">
                     <label for="tipo_comprobante">Tipo de Comprobante:</label>
                     <input type="text" class="form-control" id="tipo_comprobante">
                 </div>
             </div>
             <div class="col-sm-2 col-lg-4">
                 <div class="form-group">
                     <label for="fecha">Fecha:</label>
                     <input type="text" class="form-control" id="fecha">
                 </div>
             </div>
             </div>
             <div class="row">
                 <div class="col-sm-2 col-lg-12">
                     <div class="form-group">
                         <label for="glosa">Glosa:</label>
                         <input type="text" class="form-control" id="glosa">
                     </div>
                 </div>

             </div>
             <div class="row">

                 <div class="col-sm-2 col-lg-3">
                     <div class="form-group">
                         <label for="tipo_cambio">Tipo de Cambio:</label>
                         <input type="text" class="form-control" id="tipo_cambio">
                     </div>
                 </div>
                 <div class="col-sm-2 col-lg-5">
                     <div class="form-group">
                         <label for="moneda">Moneda:</label>
                         <input type="text" class="form-control" id="moneda">
                     </div>
                 </div>
                 <div class="col-sm-2 col-lg-4">
                     <div class="form-group">
                         <label for="estado">Estado:</label>
                         <input type="text" class="form-control" id="estado">
                     </div>
                 </div>

             </div>

         <!-- /.row this actually does not appear to be needed with the form-horizontal -->

     </form>

         <div class="row">
             <div class='wrapper text-center'>
         <div class="btn-group btn-group-lg" role="group" aria-label="...">
             <button type="button" class="btn btn-default">
                 <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                 <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
             </button>
             <button type="button" class="btn btn-default"> <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span></button>
             <button type="button" class="btn btn-default"> <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></button>
             <button type="button" class="btn btn-default">
                 <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                 <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
             </button>

         </div>
                 <div class="btn-group btn-group-lg pull-right" role="group" aria-label="...">
                 <button type="button" class="btn btn-default pull-right"> <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>

             </div>
             </div>

         </div>
 </div>
     <div class="btn-group-horizontal" style="position: relative;">
         <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
         <button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
         <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
     </div>
     <div style="position: relative;" class="borde">


         <div class="row">
             <div class='wrapper text-center'>

             </div>

         </div>
     </div>
 </div>
     <script language="javascript">
         $(document).ready(function () {
             var data;
             $.ajax({
                 dataType: "json",
                 url: 'comprobanteregister.php',
                 data: data,
                 success: function (data) {
                     var JSONObject = data;
                     console.log(JSONObject[1]['moneda']);      // Dump all data of the Object in the console
                    
             }
             });

         });

     </script></body>

</html>
