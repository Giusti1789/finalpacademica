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
?>
<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../configuraciones/css/bootstrap.min.css">
    <link rel="stylesheet" href="../configuraciones/css/estiloInsumo.css">
    <title>Pagina de inicio</title>
</head>
<body>
    <div id="content">
        <nav id="navbar" class="navbar ">
            <img src="../configuraciones/img/ita_logo.png" width="350" height="125" alt="">
            <h4>SOLICITUD DE MATERIALES Y/O CONTRATACION DE SERVICIOS</h4>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 text-center">
                 
                    <table>
                        <table class="table table-bordered table-responsive table-primary table-striped">
                            <thead>
                                <th>Id Solicitud</th>
                                <th>Descripcion</th>
                                <th>Unidad de medida</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>N°cheque</th>
                                <th>N° Partida</th>
                                <th>ID Insumo</th>
                                <th>clasificar</th>
                            </thead>
                            <tbody>
                                <?php
                                $in = new Insumo();
                                $solicitud = $in->porIdentf($id);
                                foreach ($solicitud as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['id_solicitud'] ?></td>
                                        <td><?php echo $row['descripcion'] ?></td>
                                        <td><?php echo $row['unMedida'] ?></td>
                                        <td><?php echo  number_format($row['cantidad'], 2, ',', '.'); ?> </td>                                       
                                        <td><?php echo  number_format($row['precio'], 2, ',', '.'); ?> </td>
                                        <td><?php echo $row['Ncheque'] ?></td>
                                        <td><?php echo $row['npartida'] ?></td>
                                        <td><?php echo $row['id_insumo'] ?></td>
                                        <td><a href="../guardar/clasInsumo.php.?id=<?php echo $row['id_insumo']; ?>" class="btn btn-primary float-rigth">Clasificar</a></td>
                                        <?php
                                        if ($row['id_solicitud'] == 1) { ?>
                                            <!-- <td><a href="insumo/insumo.php.?id=<?php echo $row['id_solicitud']; ?>" class="btn btn-primary float-rigth">modificar</a></td> -->
                                        <?php } ?>
                                        <?php
                                        if ($row['id_solicitud'] == 2) { ?>
                                            <!-- <td><a href="#" class="btn btn-sucess float-rigth">Ver</a></td> -->
                                        <?php } ?>

                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="../menu.php" class="btn btn-success float-warning">Volver</a></td>
                                    <td><a href="altaClasif.php.?id=<?php echo $row['id_solicitud']; ?>" class="btn btn-primary float-rigth">Subir</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <script src="configuraciones/js/jquery-3.3.1.slim.min.js"></script>
    <script src="configuraciones/js/popper.min.js"></script>
    <script src="configuraciones/js/bootstrap.min.js"></script>
    <script src="configuraciones/js/nav.js"></script>
</body>

</html>