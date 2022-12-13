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
    <link rel="stylesheet" href="configuraciones/css/estilo.css">
    <title>Agregar Usuario</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-12 col-md-4 text-center">
                <br><br><br>
                <div class="card">
                    <div class="card-header">
                        REGISTRO DE DATOS DEL USUARIO
                    </div>
                    <div class="card-body">
                    <?php if (isset($mensaje)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $mensaje; ?>
                            </div>
                        <?php } ?>
                        <form class="row g-6" method="POST" action="../guardar/guardarUsuario.php">
                            <div class="col-md-12">

                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" ">

                            <label for=" paterno" class="form-label">Apellido paterno</label>
                                <input type="text" class="form-control" id="txt_paterno" name="txt_paterno">

                                <label for="materno" class="form-label">Apellido materno</label>
                                <input type="text" class="form-control" id="txt_materno" name="txt_materno" ">

                            <label for=" contrasenia" class="form-label">Contraseña</label>
                                <input type="text" class="form-control" id="txt_materno" name="txt_contrasenia" ">

                            <label for=" celular" class="form-label">Numero de celular</label>
                                <input type="number" class="form-control" id="celular" name="txt_celular" ">

                            <label for=" carnet" class="form-label">Carnet de identidad</label>
                                <input type="text" class="form-control" id="txt_carnet" name="txt_carnet">

                                <label for="direccion" class="form-label">Direccion</label>
                                <input type="text" class="form-control" id="txt_materno" name="txt_direccion" ">

                            
                            <br>
                            <label for=" cargo" class="form-label">Cargos</label>
                                <?php
                                    require_once "../clases/claseCargo.php";
                                ?>
                                <select name="SelCargo">
                                    <option value="cargo">Seleccione cargo</option>
                                    <?php
                                    $cargo = new Cargo();
                                    $ver = $cargo->verCargos();
                                    foreach ($ver as $row) {
                                    ?>
                                        <option value="<?= $row["id_cargo"];?>"><?= $row["cargo"];?></option>
                                    <?php
                                    }
                                    ?>
                                </select>

                                <br>
                                <br>

                                <label for="carrera" class="form-label">Carrera</label>
                                <select name="selCarrera">
                                    <option value="carrera">Seleccione carrera</option>
                                    <?php
                                    require_once "../clases/claseCarrera.php";
                                    $cargo = new Carrera();
                                    $ver = $cargo->verCarrera();
                                    foreach ($ver as $row) {
                                    ?>
                                        <option value="<?= $row["id_carrera"];?>"><?= $row["nombre"];?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
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