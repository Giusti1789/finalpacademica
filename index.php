<?php 
include("clases/pruebalog.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="configuraciones/css/estilo.css">
    <title>Inicio de sesion</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-12 col-md-4 text-center">
                <br><br><br>
                <div class="card">
                    <div class="card-header">
                        INICIO DE SESIÓN
                    </div>
                    <div class="card-body">
                        <!-- //mensaje de inicio corecto o incorrecto de sesion -->
                        <?php if (isset($mensaje)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $mensaje; ?>
                            </div>
                        <?php } ?>
                        <form method="POST">
                            <div class="form-group">
                                <label>Usuario:</label>
                                <input type="text" class="form-control" id="usuario" name="txt_usuario" placeholder="Ingresar usuario">
                            </div>
                            <div class="form-group">
                                <label> Contraseña:</label>
                                <input type="password" class="form-control" name="txt_contraseña" placeholder="Contraseña" id="contraseña">
                            </div>
                            <button type="submit" class="btn btn-primary" name="btn_ingresar">Iniciar sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

