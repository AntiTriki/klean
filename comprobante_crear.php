<?php
session_name('nilds');
session_start();
include_once('conexion.php');
if(!isset($_POST['dato'])){
    $qid='';

$post=$_POST;

$date = date('Y-m-d');



$con = mysql_connect("localhost","root","");
mysql_select_db("n", $con);


$result = mysql_query("INSERT INTO comprobante 
(serie,glosa,id_tipocomprobante,fecha,id_tipocambio,fecha,id_moneda,id_estado) 

	VALUES (".$post['serie'].",'".$post['glosa']."','".$post['id']."')");

$i=1;
while ($row = mysql_fetch_assoc($result)) {
    $array['id'] = $row['id'];
    $array['serie'] = $row['serie'];
    $array['tipocom'] = $row['tipocom'];
    $row['fecha'] = date("d-m-Y", strtotime($row['fecha']));
    $array['fecha'] = $row['fecha'];
    $array['glosa'] = $row['glosa'];
    $array['cambio'] = $row['cambio'];
    $array['estado'] = $row['estado'];
    $array['moneda'] = $row['moneda'];
    $i++;
}
print json_encode($array);




































?>
