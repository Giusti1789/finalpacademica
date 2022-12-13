<?php
require_once("../clases/autoload.php");
require_once("../clases/Konectar.php");
require_once("../clases/claseusuario.php");
session_start();
if(empty($_SESSION["nombre"])){
header("location:../index.php");
}
if ($_SESSION["cargo"]!="Administrador") {
    header("location:../menu.php");
}

$id = $_GET['id'];

$objusuario = new usuario();
$usuario = $objusuario->unUsuario($id);
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
                    <form class="row g-3" method="POST" action="../guardar/guardarUsuario.php">
                        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                        <div class="col-md-8">
                            <label for="codigo" class="form-label">ID usuario</label>
                            <input readonly type="number" class="form-control" id="txt_npartida" name="txt_id"
                             value="<?php echo $usuario['id_usuario'] ?>">

                            <label for="descripcion" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" 
                            value="<?php echo $usuario['nombre'] ?>">

                            <label for="monto" class="form-label">Apellido paterno</label>
                            <input  type="text" class="form-control" id="txt_presupuesto" name="txt_paterno" 
                            value="<?php echo $usuario['ap_paterno'] ?>">

                            <label for="monto" class="form-label">Apellido materno</label>
                            <input  type="text" class="form-control" id="txt_presupuesto" name="txt_materno" 
                            value="<?php echo $usuario['ap_materno'] ?>">

                            <label for="monto" class="form-label">contraseña</label>
                            <input  type="text" class="form-control" id="txt_presupuesto" name="txt_contrasenia" 
                            value="<?php echo $usuario['contraseña'] ?>">

                            <label for="monto" class="form-label">Celular</label>
                            <input  type="number" class="form-control" id="txt_presupuesto" name="txt_celular" 
                            value="<?php echo $usuario['numero_celular'] ?>">

                            <label for="monto" class="form-label">Carnet de identidad</label>
                            <input  type="text" class="form-control" id="txt_presupuesto" name="txt_carnet" 
                            value="<?php echo $usuario['ci'] ?>">

                            <label for="monto" class="form-label">Direccion</label>
                            <input  type="text" class="form-control" id="txt_presupuesto" name="txt_direccion" 
                            value="<?php echo $usuario['direccion'] ?>">
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