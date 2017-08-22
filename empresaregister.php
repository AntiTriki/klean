<?php
session_name('nilds');
session_start();
include_once('conexion.php');

$correo=$_POST['correo'];
$nit=$_POST['nit'];
$rs=$_POST['razon_social'];
$sigla=$_POST['sigla'];
$direccion=$_POST['direccion'];
$nivel=$_POST['nivel'];

$cxn = new mysqli($mysql_host, $mysql_user, $mysql_password, $my_database);
$cxn->set_charset("utf8");
$result = $cxn->query("INSERT INTO `empresa`
  (`nit`, `razon_social`, `sigla`, `direccion`, `correo`,  `nivel`)
  VALUES(
    '".$nit."',
    '".$apellido."',
    '".$apellido."',
    '".$correo."',
    '".$contra."')") or die("Error usu:".mysqli_error($cxn));



?>
