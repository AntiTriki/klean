<?php
session_name('nilds');
session_start();

    $con = mysql_connect("localhost","root","");
    mysql_select_db("n", $con);

        $result = mysql_query("SELECT COUNT(*) AS conteo FROM cuenta where nombre='".$_POST["nombre"]."' ;");
        $row = mysql_fetch_array($result);
        if($row['conteo']==0){
            $result = mysql_query("INSERT INTO cuenta(nombre, nivel,id_tipocuenta,id_empresa) VALUES(
      '".$_POST["nombre"]."',".$_POST["nivel"].",".$_POST["tipocuenta"].",". $_SESSION["id_emp"].")");
        }



?>
