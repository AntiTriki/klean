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
        .table.table-hover.table-bordered tr:hover {
            background: none;
        }
        td:hover {
            background: lightgray;
        }
        /* a few selector examples */
        td[colspan]:hover {
            background: lime;
        }
        td[colspan] + td[colspan]:hover {
            background:turquoise;
        }
        td[colspan="2"]:hover {
            background: gold;
        }
        td[rowspan]:hover {
            background: tomato;
        }
    </style>
  </head>
 <body>
 <table class="table table-hover table-bordered">
     <thead>
     <tr>
         <th class="danger" colspan="3">Comprobante de Pago</th>
     </tr>
     </thead>
     <tr>
         <td class="warning" width="10%">Fecha:</td>
         <td colspan="2" id="vertical_align">sdf</td>
     </tr>
     <tr>
         <td rowspan="3" class="asd">Client</td>
         <td colspan="1">NAME</td>
         <td colspan="1">NAME 2</td>
     </tr>
     <tr>
         <td colspan="2">asd</td>
     </tr>
     <tr class="info">
         <td colspan="2">asd</td>
     </tr>
 </table>


 </body>
</html>
