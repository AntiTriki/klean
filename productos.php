<?php
session_name('nilds');
session_start();
try{
	$con = mysql_connect("localhost","root","");
	mysql_select_db("n", $con);
	if($_GET["accion"] == "listar")	{
		$result = mysql_query("SELECT COUNT(*) AS RecordCount FROM empresa;");
		$row = mysql_fetch_array($result);
		$recordCount = $row['RecordCount'];
		$result = mysql_query("SELECT * FROM empresa ORDER BY " . $_GET["jtSorting"] . " LIMIT " . $_GET["jtStartIndex"] . "," . $_GET["jtPageSize"] . ";");
		$rows = array();
		while($row = mysql_fetch_array($result)){
		    $rows[] = $row;
		}
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['TotalRecordCount'] = $recordCount;
		$jTableResult['Records'] = $rows;
		print json_encode($jTableResult);
	}else if($_GET["accion"] == "crear"){
		$result = mysql_query("INSERT INTO empresa(correo, nit, razon_social,sigla,direccion,nivel,id_usuario) VALUES(
'".$_POST["correo"]."','".$_POST["nit"]."','". $_POST["razon_social"]."','".$_POST["sigla"]."'
,'".$_POST["direccion"]."',".$_POST["nivel"].",
". $_SESSION["id_usuario"].")");
		$result = mysql_query("SELECT * FROM empresa WHERE id = LAST_INSERT_ID();");
		$row = mysql_fetch_array($result);
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Record'] = $row;
		print json_encode($jTableResult);
	}else if($_GET["accion"] == "actualizar"){
		$result = mysql_query("UPDATE empresa SET correo='".$_POST["correo"]."', nit='".$_POST["nit"]."', razon_social='".$_POST["razon_social"]."',
		sigla='".$_POST["sigla"]."',direccion='".$_POST["direccion"]."', nivel=".$_POST["nivel"]." WHERE id=" . $_POST["id"] . ";");
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}else if($_GET["accion"] == "eliminar"){
		$result = mysql_query("DELETE FROM empresa WHERE id= " . $_POST["id"] . ";");
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	mysql_close($con);

}catch(Exception $ex){
	$jTableResult = array();
	$jTableResult['Result'] = "ERROR";
	$jTableResult['Message'] = $ex->getMessage();
	print json_encode($jTableResult);
}	
?>