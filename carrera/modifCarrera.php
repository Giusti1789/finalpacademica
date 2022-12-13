<?php
require_once("../clases/autoload.php");
require_once("../clases/Konectar.php");
require_once("../clases/claseCarrera.php");

session_start();
if(empty($_SESSION["nombre"])){
header("location:../index.php");
}
if ($_SESSION["cargo"]!="Administrador") {
    header("location:../menu.php");
}

$id = $_GET['id'];

$objusuario = new Carrera();
$carrera = $objusuario->unRegistro($id);
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
    <title>Agregar partidas economicas</title>
</head>

<body class="py-5">
    <main class="container">
        <div class="col-md-12">
            <h3>Modificacion de Registros</h3>
            <div class="row">
                <div class="col-md-10">
                    <form class="row g-3" method="POST" action="../guardar/guardarCarrera.php">
                        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                        <div class="col-md-8">
                            <label for="codigo" class="form-label">ID de la carrera</label>
                            <input readonly type="number" class="form-control" id="txt_npartida" name="txt_npartida"
                             value="<?php echo $carrera['id_carrera'] ?>" required autofocus>

                            <label for="descripcion" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" 
                            value="<?php echo $carrera['nombre'] ?>">

                            <label for="monto" class="form-label">Presupuesto</label>
                            <input readonly type="number" class="form-control" id="txt_presupuesto" name="txt_presupuesto" 
                            value="<?php echo $carrera['presupuesto'] ?>">
                            <br>

                            <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="../administrar/administraciones.php" class="btn btn-secondary">Regresar</a>
                               
                                <br>
                            </div><br>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>