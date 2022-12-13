<?php 
$mysqli=new mysqli("localhost","root","","sisadmin");
if ($mysqli->connect_error) {
    die('Error en la conexion'.$mysqli->connect_error);
}

?>