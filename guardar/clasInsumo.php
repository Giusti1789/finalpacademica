<?php
require_once("../clases/autoload.php");
require_once("../clases/claseInsumo.php");
require_once("../clases/Konectar.php");
require_once("../clases/claseSolicitud.php");
$id = $_GET['id'];
session_start();
if (empty($_SESSION["nombre"])) {
    header("location:../index.php");
}

$in = new Insumo();
$solicitud = $in->unInsumo($id);
$b=$solicitud['id_solicitud'];
$c=$in->bucarID($b);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../configuraciones/css/bootstrap.min.css">
    <link rel="stylesheet" href="../configuraciones/css/estiloInsumo.css">
    <title>Document</title>
</head>

<body>
    <div id="content">
        <nav id="navbar" class="navbar ">
            <img src="../configuraciones/img/ita_logo.png" width="350" height="125" alt="">
            <h4>SOLICITUD DE MATERIALES Y/O CONTRATACION DE SERVICIOS</h4>
        </nav>
        <form method="POST" action="../guardar/guardarInsumo.php">
            <div class="row">
                <div class="col-12 col-md-6 text-center">
                    <input type="hidden" class="form-control" placeholder="Id" value=" <?php echo $id ?>" name="id_insumo">
                    <label for="">Unidad de medida</label>
                    <input type="text" class="form-control" placeholder="Unidad de medida" name="txt_Insumed" 
                    value="<?php echo $solicitud['unMedida'] ?>" readonly>
                    <label for="">Cantidad</label>
                    <input type="text" class="form-control" placeholder="Cantidad" name="txt_Catidad"
                    value="<?php echo number_format($solicitud['cantidad'], 2, ',', '.'); ?>" readonly>
                    <label for="">Descripcion</label>
                    <input type="text" class="form-control" placeholder="Descripcion" name="txt_Descrip"
                    value="<?php echo $solicitud['descripcion'] ?>" readonly >
                    <input type="hidden" class="form-control" placeholder="Descripcion" name="id_solicitud"
                    value="<?php echo $solicitud['id_solicitud']?>" readonly >
                    <input type="hidden" class="form-control" placeholder="Descripcion" name="id_carrera"
                    value="<?php echo $c['id_carrera']?>" readonly >
                   
                </div>
                <div class="col-12 col-md-6 text-center">
                    <br>

                    <?php
                    require_once "../clases/claseCargo.php";
                    ?>
                    <select id="sel" name="partida">
                        </BR>
                        <option value="cargo">SELECCIONE EL N° DE PARTIDA ECONOMICA</option>
                        <?php
                        $cargo = new PartidaEco();
                        $ver = $cargo->verPartida();
                        foreach ($ver as $row) {
                        ?>
                            <option value="<?= $row["npartida"]; ?>"><?= $row["npartida"]; ?></option>
                        <?php
                        }
                        ?>
                    </select><br>
                    <label for="">Precio</label>
                    <input type="number" class="form-control" placeholder="Precio" name="txt_Precio">
                    <label for="">N°cheque</label>
                    <input type="number" class="form-control" placeholder="N° Cheque" name="txt_cheque">
                    
                    
                </div>
               
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form><br><br>
</body>

</html>