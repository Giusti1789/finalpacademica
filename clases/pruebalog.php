<?php 
include("konectar.php");
$db = new Konectar();
$cone=$db->conectar();
session_start();
if ($_POST) {
    if (!empty($_POST["txt_usuario"]) and !empty($_POST["txt_contraseña"])) {
        $usuario=$_POST["txt_usuario"];
        $password=md5($_POST["txt_contraseña"]);

        $sql=$cone->query("SELECT U.id_usuario, U.nombre,U.contraseña,U.id_carrera, Ca.cargo
        from tbl_usuario as U ,  tbl_cargo as Ca 
        WHERE nombre='$usuario' and contraseña='$password' and U.id_cargo=Ca.id_cargo ");   
        
       if ($datos=$sql->fetchObject()) {
        if ($datos->nombre==$usuario and $datos->contraseña==$password) {
            $_SESSION["idUsuario"]=$datos->id_usuario;
            $_SESSION["nombre"]=$datos->nombre;
            $_SESSION["contra"]=$datos->contraseña;            
            $_SESSION["cargo"]=$datos->cargo;
            $_SESSION["carrera"]=$datos->id_carrera;
            if($_SESSION["cargo"]=="Administrador"){
                header("Location:menu.php");
            }
            if($_SESSION["cargo"]!="Administrador"){
                header("Location:menu.php");
            }
        }   else {
            $mensaje = "Error: El usuario o contraseña son incorrectos";
        }        
            
        } else {
            $mensaje = "Error: El usuario o contraseña son incorrectos";
        }
         
    } else {
        $mensaje = "Error: Campos de datos vacios";
    }
   
} 

?>