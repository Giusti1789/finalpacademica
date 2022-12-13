<?php 
require_once("../clases/autoload.php");
require_once("../clases/Konectar.php");
require_once("../clases/claseusuario.php");
session_start();
if(empty($_SESSION["nombre"])){
header("location:../index.php");
}
if ($_SESSION["cargo"]!="Administrador") {
    header("location:../menu.php");
}
$id=$_GET['id'];
$objusuario = new usuario();
if ($_SESSION["idUsuario"]!=$id) {
    $carrera = $objusuario->eliminarUsuario($id);
    if($carrera){
        echo"Registro eliminado";
        header("Location:../administrar/administraciones.php");
    }
}else{
    echo"Error al eliminar registro";
    header("Location:../menu.php");
}

?>