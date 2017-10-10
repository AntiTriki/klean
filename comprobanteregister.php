<?php
session_name('nilds');
session_start();
include_once('conexion.php');


$date = date('Y-m-d');



$con = mysql_connect("localhost","root","");
mysql_select_db("n", $con);

$result = mysql_query("SELECT 
c.id,c.serie , ti.tipocom, c.fecha,c.glosa, t.cambio,e.estado,m.moneda 
FROM `comprobante` c,
 (select c.descripcion as estado,com.id as id from concepto c, comprobante com where com.id_estado=c.id) e,
  (select c.descripcion as tipocom,com.id as id from concepto c, comprobante com where com.id_tipocomprobante=c.id) ti,
   (select c.descripcion as moneda,com.id as id from concepto c, comprobante com where com.id_moneda=c.id) m,
    tipo_cambio t where c.id=e.id and ti.id = c.id and m.id = c.id and t.id = c.id_tipocambio ORDER by id ASC");

$i=1;
while ($row = mysql_fetch_assoc($result)) {
    $array[$i][1] = $row['id'];
    $array[$i][2] = $row['serie'];
    $array[$i][3] = $row['tipocom'];
    $array[$i][4] = $row['fecha'];
    $array[$i][5] = $row['glosa'];
    $array[$i][6] = $row['cambio'];
    $array[$i][7] = $row['estado'];
    $array[$i][8] = $row['moneda'];
$i++;
   }
print json_encode($array);




































?>
