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
            <div class="row align-items-end">
                <div class="row align-items-end">
                    <div class="col-12">
                        <table class="table table-bordered table-responsive table-primary table-striped">
                            <thead>
                                <th>ID Solicitud</th>
                                <th>Descripcion</th>
                                <th>Usuario</th>
                                <th>Estado</th>
                                <th>Fecha de Registro</th>
                                <th>Reportes</th>
                                <th>Justificacion</th>
                                <th>Por Insumo</th>
                            </thead>
                            <tbody>
                                <?php
                                $objSolicitud = new Solicitud();
                                $solicitud = $objSolicitud->mostrarAdmi();
                                foreach ($solicitud as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['id_solicitud'] ?></td>
                                        <td><?php echo $row['descripcion'] ?></td>
                                        <td><?php echo $row['nombre'] ?></td>
                                        <td><?php echo $row['estado'] ?></td>
                                        <td><?php echo $row['fecha_Registro'] ?></td>                                        
                                        <td><a type="button"  href="../pdf/pdfxsolicitud.php.?id=<?php echo $row['id_solicitud']; ?>" target="_blank" class='btn btn-success'  onClick="document.formulario.action='verPDF.php'; document.formuario.submit();">REPORTE</a></td>
                                        <td><a type="button"  href="../pdf/pdfjusf.php.?id=<?php echo $row['id_solicitud']; ?>" target="_blank" class='btn btn-warning'  onClick="document.formulario.action='verPDF.php'; document.formuario.submit();">Pdf Solicitud</a></td>
                                        <td><a href="reporteIns.php.?id=<?php echo $row['id_solicitud']; ?>" class="btn btn-primary float-rigth">Verificar</a></td>                                        
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="../insumo/cheque.php" class="btn btn-primary float-rigth">Cheque</a></td>
                                    <td><a href="../menu.php" class="btn btn-success float-rigth">Regresar</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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