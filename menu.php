<?php
require_once("clases/autoload.php");
require_once("clases/Konectar.php");
require_once("clases/claseSolicitud.php");
session_start();
if (empty($_SESSION["nombre"])) {
    header("location:index.php");
}
?>
<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="configuraciones/css/bootstrap.min.css">
    <link rel="stylesheet" href="configuraciones/css/est.css">
    <!-- <link rel="stylesheet" href="configuraciones/css/boton.css"> -->
    <title>Pagina de inicio</title>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Menu de selección</h3>
            </div>
            <ul class="list-unstyled components">
                <p><?php echo $_SESSION["nombre"] . " " . $_SESSION["cargo"] ?></p>

                <?php
                if ($_SESSION["cargo"] == "Administrador" or $_SESSION["cargo"] == "jefe de carrera" ) { ?>
                    <li>
                        <a id="boton" class="btn" href="administrar/administraciones.php">Administrar</a>
                    </li>
                    <li>
                        <a id="boton" class="btn" href="solicitu/solicitudes.php">Ver solicitudes</a>
                    </li>
                <?php } ?>
                <li>
                    <a id="boton" class="btn" href="solicitu/generarSolicitud.php">Generar solicitud</a>
                </li>
            </ul>
            <ul class="list-unstyled CTAs">
                <li>
                    <td><a href="clases/cerrar.php" class="btn btn-success float-rigth">cerrar cesion</a></td>
                </li>
            </ul>
        </nav>
        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-dark bg-light">
                <div class="container-fluid" id="navbar">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span><img class="img-thumbnail" src="administracion/img/lateral.png" alt="" width="30"></span>
                    </button>
                    <?php 
                    if ($_SESSION["cargo"] == "Administrador") { ?>
                        <h1>Solicitudes pendientes</h1>
                  <?php  }  else { ?>
                    <h1>Solicitudes realizadas</h1>
                  <?php } ?>
                    
                </div>
            </nav>
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-12">
                        <table class="table table-bordered table-responsive table-primary table-striped">
                            <thead>
                                <th>ID Solicitud</th>
                                <th>Descripcion</th>
                                <th>Usuario</th>
                                <th>Estado</th>
                                <th>Fecha de Registro</th>
                                <th>Clasificar</th>
                            </thead>
                            <tbody>
                                <?php
                                $objSolicitud = new Solicitud();
                                $solicitud = $objSolicitud->mostrarAdmi();
                                if ($_SESSION["cargo"]!="Administrador") {
                                    $solicitud = $objSolicitud->mostrarXcarr($_SESSION["carrera"]);
                                }
                                foreach ($solicitud as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['id_solicitud'] ?></td>
                                        <td><?php echo $row['descripcion'] ?></td>
                                        <td><?php echo $row['nombre'] ?></td>
                                        <td><?php echo $row['estado'] ?></td>
                                        <td><?php echo $row['fecha_Registro'] ?></td>
                                        <?php
                                        if ($row['estado'] == "Pendiente") { ?>
                                            <td><a href="insumo/insumo.php.?id=<?php echo $row['id_solicitud']; ?>" class="btn btn-primary float-rigth">LLenar</a></td>
                                            <?php } elseif ($row['estado'] == "Llenado") {
                                            if ($_SESSION["cargo"] == "Administrador") { ?>
                                                <td><a href="insumo/clasifInsumo.php.?id=<?php echo $row['id_solicitud']; ?>" class="btn btn-primary float-rigth">Clasificar</a></td>

                                            <?php } else { ?>
                                                <td><a href="#" class="btn btn-success float-rigth">Ver</a></td>

                                        <?php }
                                        } ?>                        


                                        <?php
                                        if ($row['estado'] == "Completo") { ?>
                                             <td><a href="solicitu/reporteIns.php.?id=<?php echo $row['id_solicitud']; ?>" class="btn btn-success float-rigth">Ver</a></td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="solicitu/generarSolicitud.php" class="btn btn-success float-rigth">Nuevo</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </header>
    <script src="configuraciones/js/jquery-3.3.1.slim.min.js"></script>
    <script src="configuraciones/js/popper.min.js"></script>
    <script src="configuraciones/js/nav.js"></script>
    <script src="configuraciones/js/ocultar.js"></script>
</body>

</html>