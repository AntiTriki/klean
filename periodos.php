<?php
session_name('nilds');
session_start();
try{
    $con = mysql_connect("localhost","root","");
    mysql_select_db("n", $con);
    if($_GET["accion"] == "listar")	{
        $result = mysql_query("SELECT COUNT(*) AS RecordCount FROM gestion where id_empresa=".$_SESSION['id_emp'].";");
        $row = mysql_fetch_array($result);
        $recordCount = $row['RecordCount'];
        $result = mysql_query("SELECT * FROM gestion where id_empresa=".$_SESSION['id_emp']." ORDER BY " . $_GET["jtSorting"] . " LIMIT " . $_GET["jtStartIndex"] . "," . $_GET["jtPageSize"] . ";");
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
        $result = mysql_query("INSERT INTO gestion(nombre, fecha_inicio, fecha_fin,estado,id_empresa) VALUES(
'".$_POST["nombre"]."','".$_POST["fecha_inicio"]."','". $_POST["fecha_fin"]."',1,". $_SESSION["id_emp"].")");
        $result = mysql_query("SELECT * FROM gestion WHERE id = LAST_INSERT_ID() and id_empresa=".$_SESSION['id_emp'].";");
        $row = mysql_fetch_array($result);
        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['Record'] = $row;
        print json_encode($jTableResult);
    }else if($_GET["accion"] == "actualizar"){
        $result = mysql_query("UPDATE gestion SET nombre='".$_POST["nombre"]."', fecha_inicio='".$_POST["fecha_inicio"]."', fecha_fin='".$_POST["fecha_fin"]."',
		 estado=".$_POST["estado"]." WHERE id=" . $_POST["id"] . ";");
        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        print json_encode($jTableResult);
    }else if($_GET["accion"] == "eliminar"){
        $result = mysql_query("DELETE FROM gestion WHERE id= " . $_POST["id"] . ";");
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
