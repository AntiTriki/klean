<?php
if (isset($_SESSION['id_empresa']))
{$_SESSION["name"] = $_SESSION["nombre_empresa"];
$ruta_img = $_SESSION['logo'];
}
elseif (isset($_SESSION['id_usuario']))
{$_SESSION ["name"]= $_SESSION["nombre"]." ".$_SESSION["apellido"];}
if (isset($_SESSION['logo'])){
if ($_SESSION['logo'] != NULL)
{$ruta_img = $_SESSION['logo'];}
else
{$ruta_img = "images/user.jpg";}
}




?>
