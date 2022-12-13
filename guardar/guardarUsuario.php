<?php
require_once("../clases/autoload.php");
require_once("../clases/claseusuario.php");
$usuario = new usuario();
$correcto = false;

if (isset($_POST['id'])) {
    if (
        !empty($_POST["txt_nombre"]) and !empty($_POST["txt_paterno"]) and !empty($_POST["txt_materno"]) and !empty($_POST["txt_contrasenia"])
        and !empty($_POST["txt_celular"]) and !empty($_POST["txt_carnet"]) and !empty($_POST["txt_direccion"] and $_POST["SelCargo"] != "Seleccione cargo") and ($_POST["selCarrera"] != "Seleccione carrera")
    ) {
        $id = $_POST['id'];
        $nombre = $_POST['txt_nombre'];
        $paterno = $_POST['txt_paterno'];
        $materno = $_POST['txt_materno'];
        $contra = md5($_POST['txt_contrasenia']);
        $celular = $_POST['txt_celular'];
        $ci = $_POST['txt_carnet'];
        $direccion = $_POST['txt_direccion'];
        $cargo = $_POST['SelCargo'];
        $carrera = $_POST['selCarrera'];
        $insertar = $usuario->modificarUsuario($id, $nombre, $paterno, $materno, $contra, $celular, $ci, $direccion, $cargo, $carrera);
    }else {
        $insertar = false;
        $mensaje = "Error: Datos no validos";
    }
} else {

    $nombre = $_POST['txt_nombre'];
    $paterno = $_POST['txt_paterno'];
    $materno = $_POST['txt_materno'];
    $contra = md5($_POST['txt_contrasenia']);
    $celular = $_POST['txt_celular'];
    $ci = $_POST['txt_carnet'];
    $direccion = $_POST['txt_direccion'];
    $cargo = $_POST['SelCargo'];
    $carrera = $_POST['selCarrera'];
    if (
        !empty($_POST["txt_nombre"]) and !empty($_POST["txt_paterno"]) and !empty($_POST["txt_materno"]) and !empty($_POST["txt_contrasenia"])
        and !empty($_POST["txt_celular"]) and !empty($_POST["txt_carnet"]) and !empty($_POST["txt_direccion"] and $_POST["SelCargo"] != 0) and ($_POST["selCarrera"] != 0)
    ) {
        $insertar = $usuario->agregar_usuario($nombre, $paterno, $materno, $contra, $celular, $ci, $direccion, $cargo, $carrera);
    }else{
        $insertar = false;
        $mensaje = "Error: Datos no validos";
    }
}



if ($insertar) {
    $correcto = true;
    $mensaje = "Valido: Datos validos";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="configuraciones/css/estilo.css">
    <link rel="stylesheet" href="../configuraciones/css/mensajes.css">
    <title>Guardar</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-6">
                <div class="card">

                    <?php if ($correcto) { ?>
                        <div class="card-header">
                            <?php if (isset($mensaje)) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $mensaje; ?>
                                </div>
                            <?php } ?>
                        </div>
                        <h3>Datos guardados</h3>
                    <?php } else { ?>
                        <div class="card-header">
                            <?php if (isset($mensaje)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $mensaje; ?>
                                </div>
                            <?php } ?>
                        </div>
                        <h3>Error al guardar los datos</h3>
                    <?php } ?>
                    <a class="btn btn-primary" href="../administrar/administraciones.php">volver</a>
                </div>

            </div>
        </div>
    </main>
</body>
</html>