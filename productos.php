<?php
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
		$result = mysql_query("INSERT INTO empresa VALUES(NULL,'".$_POST["nombre"]."',".$_POST["precio"].",".$_POST["cantidad"].",'". $_POST["proveedor"]."')");
		$result = mysql_query("SELECT * FROM empresa WHERE id = LAST_INSERT_ID();");
		$row = mysql_fetch_array($result);
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Record'] = $row;
		print json_encode($jTableResult);
	}else if($_GET["accion"] == "actualizar"){
		$result = mysql_query("UPDATE empresa SET nombre='".$_POST["nombre"]."', precio=".$_POST["precio"].", cantidad=".$_POST["cantidad"].",proveedor='".$_POST["proveedor"]."' WHERE id=" . $_POST["id"] . ";");
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