<?php
include("../clases/autoload.php");
include("../clases/claseCarrera.php");
$carrera = new PartidaEco();
$correcto = false;

if (!empty($_POST["txt_descripcion"]) and !empty($_POST['txt_presupuesto'])
    and !empty($_POST['textarea']) and !empty($_POST['txt_nro'])) 
    {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $codPartida = $_POST['txt_nro'];
        $descrip = $_POST['txt_descripcion'];
        $presupuesto = $_POST['txt_presupuesto'];
        $det = $_POST['textarea'];
        $insertar = $carrera->modificarPartida($id, $descrip, $presupuesto, $det);
    } else {

        $codPartida = $_POST['txt_nro'];
        $descrip = $_POST['txt_descripcion'];
        $presupuesto = $_POST['txt_presupuesto'];
        $det = $_POST['textarea'];

        $insertar = $carrera->agrgarPartida($codPartida, $descrip, $presupuesto, $det);
    }
} else {
    $insertar = false;
    $mensaje = "Error: Campos de datos vacios";
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