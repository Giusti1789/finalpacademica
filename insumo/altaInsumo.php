<?php 
require_once("../clases/autoload.php");
require_once("../clases/Konectar.php");
require_once("../clases/claseSolicitud.php");
$id = $_GET['id'];
$soli=new Solicitud();
$ob=$soli->cambioEstado($id,3);
header("location:../menu.php");
?>