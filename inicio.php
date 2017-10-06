<?php
include_once('conexion.php');
$id_emp=$_GET['id'];
$_SESSION['id_emp']=$id_emp;
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
    </style>
  </head>
 <body></body>
</html>
