<?php
require_once("../clases/autoload.php");
require_once("../clases/claseInsumo.php");
require_once("../clases/Konectar.php");
require_once("../clases/claseSolicitud.php");
session_start();
if (empty($_SESSION["nombre"])) {
    header("location:../index.php");
}





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
        <form method="POST" action="">
            <div class="container">
                <div class="row align-items-end">
                    <div class="row align-items-end">
                        <div class="col-6">

                            <h1>Busqueda por numero de cheque</h1>
                            <input type="text" class="form-control" id="txt_nombre" name="cheque">
                            <br>
                            <button type="submit" class="btn btn-primary" name="buscar">Buscar</button>
                            <a href="../solicitu/solicitudes.php" class="btn btn-secondary">Regresar</a>
                            <br>
                            <br>
                        
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php


        if (isset($_POST['buscar'])) { ?>
            <div class="container">
                <div class="row align-items-end">
                    <div class="row align-items-end">
                        <div class="col-6">

                            <table class="table table-bordered table-responsive table-primary table-striped">
                                <thead>
                                    <th>Nombre</th>
                                    <th>Cheque</th>
                                    <th>Precio</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $cheque = $_POST['cheque'];
                                    $in = new Insumo();
                                    $solicitud = $in->cheque($cheque);
                                    foreach ($solicitud as $row) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['descripcion'] ?></td>
                                            <td><?php echo $row['Ncheque'] ?></td>
                                            <td><?php echo $row['precio'] ?></td>

                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td></td>
                                        <td><a href="../insumo/cheque.php" class="btn btn-primary float-rigth">volver</a></td>
                                        <td><a type="button"  href="../pdf/reportecheque.php.?id=<?php echo $row['Ncheque']; ?>" target="_blank" class='btn btn-success'  onClick="document.formulario.action='verPDF.php'; document.formuario.submit();">PDF</a></td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        <?php }
        ?>

</body>

</html>