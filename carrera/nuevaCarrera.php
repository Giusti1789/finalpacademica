<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="configuraciones/css/estilo.css">
    <title>Agregar Carrera</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-12 col-md-4 text-center">
                <br><br><br>
                <div class="card">
                    <div class="card-header">
                        REGISTRAR DATOS DE LA CARRERA
                    </div>
                    <div class="card-body">
                        <!-- //mensaje de inicio corecto o incorrecto de sesion -->
                        <form class="row g-6" method="POST" action="../guardar/guardarCarrera.php">
                            <div class="col-md-12">

                                <label for="paterno" class="form-label">NOMBRE DE LA CARRERA</label>
                                <input type="text" class="form-control" id="descripcion" name="txt_nombre">


                                <label for="materno" class="form-label">Presupuesto</label>
                                <input type="number" class="form-control" id="presupusesto" name="txt_presupuesto">
                                <br>


                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="../administrar/administraciones.php" class="btn btn-secondary">Regresar</a>


                            </div>
                        </form>


                    </div>

                </div>
            </div>
        </div>
    </div>


</body>

</html>