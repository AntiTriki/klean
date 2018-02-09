<?php
session_name('nilds');
session_start();

include_once('conexion.php');
$id_emp=$_GET['id'];
$_SESSION['nivel_empresa'] =$_GET['nivel'];

if(isset($_SESSION['id_ges']))
{
    unset($_SESSION['id_ges']);
}
$link = new mysqli($mysql_host, $mysql_user, $mysql_password, $my_database);


$query_user = sprintf("SELECT
             u.correo,
						 u.razon_social,
						 u.sigla,
						 u.direccion,
						 u.nit,
						 u.nivel



						 FROM
             empresa u
 						 WHERE
						 u.id=$id_emp


						 ");
$link->set_charset("utf8");
$result_user = mysqli_query($link,$query_user) or die("Error usu:".mysqli_error($link));
$row2 = mysqli_fetch_array($result_user);
$_SESSION['nombreemp']=$row2['sigla'];
include_once('bars.php');
$_SESSION['id_emp']=$id_emp;
$_SESSION['nombreemp']=$row2['sigla'];
$_SESSION['nivel']=$row2['nivel'];
echo $_SESSION['nivel'];
date_default_timezone_set('America/La_Paz');
$query = $link->query("SELECT * FROM cuenta where nivel=".$_SESSION['nivel']." and id_empresa=".$_SESSION['id_emp']." ");
$data = array();
while ($row = $query->fetch_assoc()) {
    array_push($data, array('label'=> $row['codigo']." - ".$row['text'], 'value' => $row['codigo']." - ".$row['text'], 'id'=>$row['id']));
}

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
        #background{
            position:absolute;
            z-index:0;
            background:white;
            display:block;
            min-height:50%;
            min-width:50%;
            color:yellow;
            margin-left: 40%;
        }

        #content{
            position:absolute;
            z-index:1;
        }

        #bg-text
        {
            color:lightgrey;
            font-size:120px;
            transform:rotate(300deg);
            -webkit-transform:rotate(300deg);
        }
    </style>
  </head>
 <body>
 <div id="background">
     <p id="bg-text"><?php echo $_SESSION['nombreemp']; ?></p>
 </div>
 <div class="modal fade" id="add_det" tabindex="-1" role="dialog" aria-labelledby="myModalLabl">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myModalLabel">Detalle Cuenta</h4>
             </div>

             <div class="modal-body">
                 <div data-toggle="validator" >

                     <div class="form-group">
                         <label class="control-label" for="cuenta_cod">Cuenta:</label>
                         <input type="text" name="cuenta_cod" id="cuenta_cod" class="form-control"  />
                         <div class="help-block with-errors"></div>
                         <input type="hidden" name="id_cuenta_auto" id="id_cuenta_auto"></input>


                     </div>

                     <div class="form-group">
                         <label class="control-label" for="glosa_detalle">Glosa:</label>
                         <input type="text"  name="glosa_detalle" id="glosa_detalle" class="form-control" >
                         <div class="help-block with-errors"></div>
                     </div>
                     <div class="form-group">
                         <label class="control-label" for="debe_detalle">Debe:</label>
                         <input type="number" step="0.01" name="debe_detalle"  id="debe_detalle" class="form-control" >
                         <div class="help-block with-errors"></div>
                     </div>
                     <div class="form-group">
                         <label class="control-label" for="haber_detalle">Haber:</label>
                         <input type="number" step="0.01" name="haber_detalle"  id="haber_detalle" class="form-control" >
                         <div class="help-block with-errors"></div>
                         <input type="hidden" name="conteo" id="conteo">
                     </div>


                     <div class="form-group">
                         <button id="addToTable" type="button" class="btn crud-submit btn-success ">Agregar</button>
                     </div>



                 </div>
             </div>

         </div>

     </div>
 </div>
 <script>
     $(function() {
         $('#cuenta_cod').autocomplete({
             source: array_auto,
             change: function (event, ui) {
                 $("#id_cuenta_auto").val(ui.item.id);
                 return false;
             } });
     });
     //date picker js
     $(document).ready(function() {
         $('.datepicker').datepicker({
             todayHighlight: true,
             "autoclose": true,
             format: 'dd-mm-yyyy'
         }).on('changeDate', function() {

             confirmar_fecha();
         });
     });
 </script>
 </body>
</html>

