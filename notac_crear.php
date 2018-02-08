<?php
session_name('nilds');
session_start();
include_once('conexion.php');


$serie=$_POST['serie'];
$glosa=$_POST['glosa'];
$fecha=$_POST['fecha'];


$con = mysql_connect("localhost","root","");
mysql_select_db("n", $con);
$date = date('Y-m-d');
$fecha = str_replace('-', '-', $_POST["fecha"]);
$fecha = date('Y-m-d', strtotime($fecha));
$result = mysql_query("INSERT INTO nota_compra (nro_nota,descripcion,fecha,id_empresa) 
VALUES 
(".$serie.",'".$glosa."','".$fecha."',".$_SESSION['id_emp'].")");

$result = mysql_query("SELECT * from nota_compra
 ORDER by id DESC LIMIT 1");

$i=1;
while ($row = mysql_fetch_assoc($result)) {
    $array['id'] = $row['id'];
    $id_comprobante = $row['id'];
    $array['serie'] = $row['nro_nota'];

    $row['fecha'] = date("d-m-Y", strtotime($row['fecha']));
    $array['fecha'] = $row['fecha'];
    $array['glosa'] = $row['descripcion'];
    $array['total'] = $row['total'];

    $i++;
}
for($i=1;$i<$_POST['conteo']+1;$i++) {
    $result = mysql_query("INSERT INTO detalle_nota (id_articulo,id_notac,cantidad) 
VALUES 
(" . $_POST['id_detalle' . $i] . "," . $id_comprobante . "," . $_POST['debe' . $i] . ")");
    $last_id = mysql_insert_id();
    $result = mysql_query("SELECT max(nro_lote) AS cor FROM lote where id_articulo = " . $_POST['id_detalle' . $i] . ";") or die(mysql_error());
    $row = mysql_fetch_array($result);
    $cor = $row['cor'];
    $cor = $cor + 1;


    $result = mysql_query("INSERT INTO lote (id_articulo,id_notadc,nro_lote,fecha_ing,precio_compra,cantidad) 
VALUES 
(" . $_POST['id_detalle' . $i] . ",".$last_id.",".$cor.",'" . $fecha . "','" . $_POST['haber' . $i] . "'," . $_POST['debe' . $i] . ")");

}

$cor=0;

print json_encode($array);

?>