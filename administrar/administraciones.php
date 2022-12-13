<?php
require_once("../clases/autoload.php");
require_once("../clases/Konectar.php");
require_once("../clases/claseCarrera.php");
require_once("../clases/claseusuario.php");
session_start();
if(empty($_SESSION["nombre"])){
header("location:../index.php");
}
if ($_SESSION["cargo"]!="Administrador") {
    header("location:../menu.php");
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
    <link rel="stylesheet" href="../configuraciones/css/estiloadmi.css">
    <link rel="stylesheet" href="../configuraciones/css/estilobtn.css">
    <title>Pagina de inicio</title>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Administración General</h3>
            </div>

            <ul class="list-unstyled components">
                <p><?php echo $_SESSION["cargo"] . " " . $_SESSION["nombre"] ?></p>  

                <li>
                    <button id="btn12" name="btnUsuarios" onclick="mostrarU();">Administracion de Usuarios</button>
                </li>
                <li>
                    <button id="btn12" name="btnPartidas" onclick="mostrarP();">Partidas economicas</button>
                </li>
                <li>
                    <button id="btn12" name="btnCarrera" onclick="mostrarC();">Presupuestos por carrera</button>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <td><a href="../menu.php" class="btn btn-success float-rigth">Volver</a></td>
                </li>
            </ul>
        </nav>
        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span><img class="img-thumbnail" src="administracion/img/lateral.png" alt="" width="30"></span>
                    </button>
                    <h1>Administraciones generales</h1>
                </div>
            </nav>
            <!-- tabla1 TABLA DE USUARIOS -->
            <div class="container" id="formularioUsuario">
                <div class="row align-items-end">
                    <div class="col-12">
                        <table class="table table-bordered table-responsive table-primary table-striped">
                            <thead>
                                <th>ID Usuario</th>
                                <th>Nombre</th>                                
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Contraseña</th>
                                <th>Celular</th>
                                <th>Carnet Identidad</th>
                                <th>Direcion</th>
                                <th>Cargo</th>
                                <th>Carrera</th>
                                <th></th>
                                <th></th>                                
                            </thead>
                            <tbody>
                            <?php
                                $objusuario = new usuario();
                                $usuario = $objusuario->verusuesp();
                                foreach ($usuario as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['id_usuario'] ?> </td>
                                        <td><?php echo $row['nombre'] ?> </td>
                                        <td><?php echo $row['ap_paterno'] ?> </td>
                                        <td><?php echo $row['ap_materno'] ?> </td>
                                        <td><?php echo $row['contraseña'] ?> </td>
                                        <td><?php echo $row['numero_celular']?> </td>
                                        <td><?php echo $row['ci'] ?> </td>
                                        <td><?php echo $row['direccion'] ?> </td>
                                        <td><?php echo $row['cargo'] ?> </td>
                                        <td><?php echo $row['carrera'] ?> </td>                                

                                        
                                        <td><a href="../usuarios/modiusu.php?id=<?php echo $row['id_usuario']; ?>" class="btn btn-warning">EDITAR</a></td>
                                        <td><a href="../guardar/elimUsuario.php?id=<?php echo $row['id_usuario']; ?>" class="btn btn-danger">ELIMINAR</a></td>                                        
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
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>                                    
                                <td><a href="../usuarios/nuevoUsuario.php" class="btn btn-success">Nuevo</a></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- tabla2 PARTIDAS PRESUPUESTARIAS-->
            <div class="container" id="formularioPartida">
                <div class="row align-items-end">
                    <div class="col-12">
                        <table class="table table-bordered table-responsive table-primary table-striped">
                            <thead>
                                <th>N° partida</th>
                                <th>Descripcion</th>
                                <th>Presupuesto</th>
                                <th>Detalle</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php
                                $objpartida = new partidaEco();
                                $partida = $objpartida->verPartida();
                                foreach ($partida as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['npartida'] ?> </td>
                                        <td><?php echo $row['descripcion'] ?> </td>
                                        <td><?php echo  number_format($row['monto'], 2, ',', '.'); ?> </td>
                                        <td><?php echo $row['detalle'] ?> </td>
                                        <td><a href="../partidas/modifPartida.php?id=<?php echo $row['npartida']; ?>" class="btn btn-warning">EDITAR</a></td>
                                        <td><a href="../guardar/elimiPartida.php?id=<?php echo $row['npartida']; ?>" class="btn btn-danger">ELIMINAR</a></td>
                                        <td><a href="../partidas/smrPartida.php?id=<?php echo $row['npartida']; ?>" class="btn btn-primary">MODIFICAR</a></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="../partidas/nuevaPartida.php" class="btn btn-success">Nuevo</a></td>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- tabla3 CARRERAS -->
            <div class="container" id="formularioCarrera">
                <div class="row align-items-end">
                    <div class="col-12">
                        <table class="table table-bordered table-responsive table-primary table-striped">
                            <thead>
                                <th>ID carrera</th>
                                <th>Nombre carrera</th>
                                <th>Presupuesto</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php
                                $objusuario = new Carrera();
                                $carrera = $objusuario->verCarrera();
                                foreach ($carrera as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['id_carrera'] ?> </td>
                                        <td><?php echo $row['nombre'] ?> </td>
                                        <td><?php echo  number_format($row['presupuesto'], 2, ',', '.'); ?> </td>
                                        <td><a href="../carrera/modifCarrera.php?id=<?php echo $row['id_carrera']; ?>" class="btn btn-warning">EDITAR</a></td>
                                        <td><a href="../guardar/elimCarrera.php?id=<?php echo $row['id_carrera']; ?>" class="btn btn-danger">ELIMINAR</a></td>
                                        <td><a href="../carrera/sumprep.php?id=<?php echo $row['id_carrera']; ?>" class="btn btn-primary">AGREGAR</a></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="../carrera/nuevaCarrera.php" class="btn btn-success">Nuevo</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </header>
    <script src="../configuraciones/js/jquery-3.3.1.slim.min.js"></script>
    <script src="../configuraciones/js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../configuraciones/js/nav.js"></script>
    <script src="../configuraciones/js/ocultar.js"></script>


</body>

</html>