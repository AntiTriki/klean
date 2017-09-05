<?php
session_name('nilds');
session_start();
try{
    $con = mysql_connect("localhost","root","");
    mysql_select_db("n", $con);
    if($_GET["accion"] == "listar")	{
        $result = mysql_query("SELECT COUNT(*) AS RecordCount FROM periodo where id_gestion=".$_SESSION['id_ges'].";");
        $row = mysql_fetch_array($result);
        $recordCount = $row['RecordCount'];
        $result = mysql_query("SELECT * FROM periodo where id_gestion=".$_SESSION['id_ges']." ORDER BY " . $_GET["jtSorting"] . " LIMIT " . $_GET["jtStartIndex"] . "," . $_GET["jtPageSize"] . ";");
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
        $result = mysql_query("INSERT INTO periodo(nombre, fecha_inicio, fecha_fin,estado,id_gestion) VALUES(
'".$_POST["nombre"]."','".$_POST["fecha_inicio"]."','". $_POST["fecha_fin"]."',1,". $_SESSION["id_ges"].")");
        $result = mysql_query("SELECT * FROM periodo WHERE id = LAST_INSERT_ID() and id_empresa=".$_SESSION['id_ges'].";");
        $row = mysql_fetch_array($result);
        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['Record'] = $row;
        print json_encode($jTableResult);
    }else if($_GET["accion"] == "actualizar"){
        $result = mysql_query("UPDATE periodo SET nombre='".$_POST["nombre"]."', fecha_inicio='".$_POST["fecha_inicio"]."', fecha_fin='".$_POST["fecha_fin"]."',
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
