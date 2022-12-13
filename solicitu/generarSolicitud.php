<?php
date_default_timezone_set("America/Caracas");
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
    <link rel="stylesheet" href="../configuraciones/css/estilosolicitud.css">

    <title>Pagina de inicio</title>
</head>
<body>
    <div id="content">
        <nav id="navbar" class="container-fluid">
            <h1>SOLICITUD DE MATERIAS Y/O CONTRATACIóN DE SERVICIOS</h1>
            <h4><?php echo Date("d-m Y"); ?></h4>
        </nav>
        
        <ul class="list-unstyled components">
            <div>
                <p>Por favor introduzca una descripcion general de la solicitud a realizar (Justificacion del pedido) </p>
            </div>
        </ul>
        <!-- cuerpo -->
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-12 col-md-6 text-center">

                    <div class="card">
                        <div class="card-header">
                            REGISTRO DE DATOS
                        </div>
                        <div class="card-body">
                            <!-- //mensaje de inicio corecto o incorrecto de sesion -->
                            <form class="row g-6" method="POST" action="../guardar/guardarSolicitud.php">
                                <div class="col-md-12">
                                    <label  class="form-label">Descripcion</label>
                                    <textarea name="textarea" class="form-control" id="descripcion" rows="15" cols="50"></textarea>

                                    
                                    <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION["idUsuario"] ?>">

                                   
                                    <input type="hidden" class="form-control" id="txt_estado" name="txt_estado" value="<?php echo 1; ?>">

                                  
                                    <input type="hidden" class="form-control" id="txt_fecha" name="txt_fecha" value="<?php echo date('Y-m-d')?>">
                                    <br>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                    <a href="../menu.php" class="btn btn-secondary">Regresar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </header>
    <script src="configuraciones/js/jquery-3.3.1.slim.min.js"></script>
    <script src="configuraciones/js/popper.min.js"></script>
    <script src="configuraciones/js/bootstrap.min.js"></script>
    <script src="configuraciones/js/nav.js"></script>
</body>
</html>