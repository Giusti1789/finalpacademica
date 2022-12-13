<?php 
session_start();
if(empty($_SESSION["nombre"])){
header("location:../index.php");
}
if ($_SESSION["cargo"]!="Administrador") {
    header("location:../menu.php");
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
    <!-- <link rel="stylesheet" href="configuraciones/css/estilo.css"> -->
    <title>Agregar Partida</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-12 col-md-4 text-center">
                <br><br><br>
                <div class="card">
                    <div class="card-header">
                        REGISTR DE DATOS DE LA PARTIDA ECONOMICA
                    </div>
                    <div class="card-body">
                        <!-- //mensaje de inicio corecto o incorrecto de sesion -->
                        <form class="row g-6" method="POST" action="../guardar/guardarPartida.php">
                         <div class="col-md-12">                            
                           
                            <label for="nombre" class="form-label">N° de partida Economica</label>
                            <input type="number" class="form-control" id="Npartida" name="txt_nro" ">

                            <label for="paterno" class="form-label">Descripcion</label>
                            <input type="text" class="form-control" id="descripcion" name="txt_descripcion" >
                            

                            <label for="materno" class="form-label">Presupuesto</label>
                            <input type="number" class="form-control" id="presupusesto" name="txt_presupuesto" ">

                            <label for="contrasenia" class="form-label">Detalle</label>
                            <!-- <input type="text" class="form-control" id="txt_materno" name="txt_contrasenia" "> -->
                            <textarea name="textarea" class="form-control" id="detalle" rows="10" cols="40"></textarea>
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