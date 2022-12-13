<?php 
require_once("../clases/autoload.php");
require_once("../clases/Konectar.php");
require_once("../clases/claseInsumo.php");

$id=$_GET['id'];
$insumo = new Insumo();
$carrera = $insumo->eliminarInsumo($id);

if($carrera){
    echo"Registro eliminado";
    header("Location:../menu.php");
}else{
    echo"Error al eliminar registro";
    header("Location:../menu.php");
}

?>