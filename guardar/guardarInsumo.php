<?php
error_reporting(0);
require_once("../clases/autoload.php");
require_once("../clases/Konectar.php");
require_once("../clases/claseInsumo.php");
require_once("../clases/claseCarrera.php");
$carr = new Carrera();
$insumo = new Insumo();
$correcto = false;
$partida = new PartidaEco();


if (isset($_POST['id_insumo'])) {
    if (!empty($_POST["id_carrera"]) and !empty($_POST['id_insumo']) and !empty($_POST['id_solicitud'])and !empty($_POST['txt_Descrip'])
    and !empty($_POST["txt_Insumed"])and !empty($_POST["txt_Catidad"])and !empty($_POST["txt_Precio"])and !empty($_POST["txt_cheque"])
    and !empty($_POST["partida"]!="SELECCIONE EL N° DE PARTIDA ECONOMICA")) {
        $carrera = $_POST['id_carrera'];
        $id_insumo = $_POST['id_insumo'];
        $idsolicitud = $_POST['id_solicitud'];
        $descrip = $_POST['txt_Descrip'];
        $medida = $_POST['txt_Insumed'];
        $cant = $_POST['txt_Catidad'];
        $price = $_POST['txt_Precio'];
        $cheq = $_POST['txt_cheque'];
        $Npart = $_POST['partida'];
    
    
        if ($partida->veriPart($Npart, $price)) {
            if ($carr->veriCarr($carrera, $price)) {
                $insertar = $insumo->modificarInsumo($id_insumo, $descrip, $medida, $cant, $price, $cheq, $Npart, $idsolicitud);
                $restar = $partida->restar($Npart, $price);
                $res = $carr->restar($carrera, $price);
                $mensaje = "Valido: Datos guardados de manera correcta";
                
            } else {
                $correcto = false;
                $insertar = false;
                $sw = 1;
                $mensaje = "Error: El presupuesto de la carrera es insuficiente";
            }
        } else {
            $correcto = false;
            $insertar = false;
            $sw = 2;
            $mensaje = "Error: El presupuesto de la partida es insuficiente";
        }
    }else{
        $sw = 5;
        $insertar = false;
        $mensaje = "Error: Campos de datos vacios"; 
    }
    
} else {
    if (!empty($_POST["txt_Insumed"]) and !empty($_POST['txt_Catidad']) and !empty($_POST['txt_Descrip'])) {
        $idsolicitud = $_POST['id_solicitud'];
        $descrip = $_POST['txt_Descrip'];
        $medida = $_POST['txt_Insumed'];
        $cant = $_POST['txt_Catidad'];
        $price = $_POST['txt_Precio'];
        $cheq = $_POST['txt_cheque'];
        $Npart = $_POST['partida'];

        $insertar = $insumo->agregInsumo($descrip, $medida, $cant, $price, $cheq, $Npart, $idsolicitud);
        $mensaje = "Valido: Datos guardados de manera correcta";
    } else {
        $sw = 5;
        $insertar = false;
        $mensaje = "Error: Campos de datos vacios";
    }
}
if ($insertar) {
    $correcto = true;
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
    <title>Guardar</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <?php if ($correcto) { ?>
                        <div class="card-header">
                        <div class="alert alert-success" role="alert">
                                    <?php echo $mensaje; ?>
                                </div>
                        </div>
                        <div class="card-body">
                            <?php if (isset($_POST['id_insumo'])) { ?>
                                <td><a href="../insumo/clasifInsumo.php.?id=<?php echo $idsolicitud; ?>" class="btn btn-primary float-rigth">Regresar</a></td>
                            <?php } else { ?>
                                <td><a href="../insumo/insumo.php.?id=<?php echo $idsolicitud; ?>" class="btn btn-primary float-rigth">Regresar</a></td>
                            <?php } ?>
                        </div>
                    <?php } else { ?>
                        <div class="card-header">
                            <div class="alert alert-danger" role="alert">
                                <?php echo $mensaje; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if ($sw == 1) { ?>
                                <h3>Error al guardar los datos</h3>
                                <h3>El presupuesto de la carrera es insuficiente</h3>
                                <td><a href="../guardar/clasInsumo.php.?id=<?php echo $idsolicitud; ?>" class="btn btn-primary float-rigth">Regresar</a></td>
                            <?php }
                            if ($sw == 2) { ?>
                                <h3>Error al guardar los datos</h3>
                                
                                <td><a href="../guardar/clasInsumo.php.?id=<?php echo $idsolicitud; ?>" class="btn btn-primary float-rigth">Regresar</a></td>
                            <?php }
                            if ($sw == 5) { ?>
                                <h3>Llenar los datos requeridos </h3>
                                <td><a href="../menu.php" class="btn btn-primary float-rigth">Regresar</a></td>

                            <?php } ?>

                        <?php } ?>
                        </div>
                </div>
            </div>
        </div>
        </div>
        <div class="row">
            <!-- <td><a href="../insumo/insumo.php.?id=<?php echo $idsolicitud; ?>" class="btn btn-primary float-rigth">Regresar</a></td> -->
        </div>
    </main>
</body>

</html>