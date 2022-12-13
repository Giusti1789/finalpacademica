<?php 
require_once("../clases/autoload.php");
require_once("../clases/Konectar.php");
require_once("../clases/partidaEco.php");

$id=$_GET['id'];
$objusuario = new PartidaEco();
$carrera = $objusuario->eliminarPartida($id);

if($carrera){
    echo"Registro eliminado";
    header("Location:../administrar/administraciones.php");
}else{
    echo"Error al eliminar registro";
    header("Location:../menu.php");
}

?>