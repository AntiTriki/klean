<?php
session_name('nilds');
session_start();
include_once('conexion.php');


$con = mysql_connect("localhost","root","");
mysql_select_db("n", $con);
$rot=0;
$result = mysql_query("truncate mayor ");
    $result = mysql_query("select * from cuenta where id_empresa=".$_SESSION['id_emp']." and nivel = ".$_SESSION['nivel_empresa']."   order by id asc");
        while ($row = mysql_fetch_array($result)) {
            $res = mysql_query("select  c.*, cu.id as id_cuenta,d.id as deta, d.haber,d.debe,
                                                from
                                        comprobante c inner join detalle_comprobante d on c.id = d.id_comprobante
                                       inner join cuenta cu on d.id_cuenta = cu.id and cu.id= ".$row['id']." order by d.id, fecha asc");
                if($res){
                    while ($ro = mysql_fetch_array($res)) {
                        $rot=floatval($ro['haber'])-floatval($ro['debe'])+ $rot;
echo $ro['deta'] .' '.$ro['haber'].' '.$ro['debe'].' ' .$rot.'<br>';

                        $resulti = mysql_query("INSERT INTO mayor (total, id_d)
VALUES
('" . $rot . "'," . $ro['id_d'] . ")");


                    }

                    }else{

                    }

$rot=0;

        }












//        $result = mysql_query("INSERT INTO comprobante (serie,glosa,id_tipocomprobante,fecha,tipocambio,id_moneda,id_estado,id_empresa,id_periodo)
//VALUES
//(" . $serie . ",'" . $glosa . "'," . $tipo_comprobante . ",'" . $fecha . "','" . $tipo_cambio . "'," . $moneda . "," . $estado . "," . $_SESSION['id_emp'] . ",".$row['id'].")");
//        $result = mysql_query("SELECT
//c.id,c.serie , ti.tipocom, c.fecha,c.glosa, c.tipocambio as cambio,e.estado,m.moneda
//FROM `comprobante` c,
// (select c.descripcion as estado,com.id as id from concepto c, comprobante com where com.id_estado=c.id) e,
//  (select c.descripcion as tipocom,com.id as id from concepto c, comprobante com where com.id_tipocomprobante=c.id) ti,
//   (select c.descripcion as moneda,com.id as id from concepto c, comprobante com where com.id_moneda=c.id) m
//     where c.id=e.id and ti.id = c.id and m.id = c.id  ORDER by id DESC LIMIT 1");
//        $i = 1;
//        while ($row = mysql_fetch_assoc($result)) {
//            $array['id'] = $row['id'];
//            $id_comprobante = $row['id'];
//            $array['serie'] = $row['serie'];
//            $array['tipocom'] = $row['tipocom'];
//            $row['fecha'] = date("d-m-Y", strtotime($row['fecha']));
//            $array['fecha'] = $row['fecha'];
//            $array['glosa'] = $row['glosa'];
//            $array['cambio'] = $row['cambio'];
//            $array['estado'] = $row['estado'];
//            $array['moneda'] = $row['moneda'];
//            $i++;
//        }
//        for ($i = 1; $i < $_POST['conteo'] + 1; $i++) {
//            $result = mysql_query("INSERT INTO detalle_comprobante (glosa,id_cuenta,id_comprobante,debe,haber, id_periodo)
//VALUES
//('" . $_POST['glosa' . $i] . "'," . $_POST['id_detalle' . $i] . "," . $id_comprobante . ",'" . $_POST['debe' . $i] . "','" . $_POST['haber' . $i] . "',".$id_f.")");
//        }
//    }
//}
//header('Content-type: application/json');
//print json_encode($array);








































?>
