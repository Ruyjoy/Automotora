<?php

session_start();
include "config/database.php";
$db = new Database();
$con = $db->conectar();



//control de roles por session 
if (!isset($_SESSION['rol'])) {

    header('location: login.php');
} else if ($_SESSION['rol'] != 1) {

    header('location: login.php');
}
//-----------------------------
//cerrar Session
if (isset($_POST['cerrar'])) {

    session_unset();
    session_destroy();
    header('location: login.php');
}
//-----------------------------

$consulta = "SELECT * FROM usuario where rol = 2";
$resultado = mysqli_query($con, $consulta);

$cant_filas = mysqli_num_rows($resultado);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<header>

    <div class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">
                <strong>Automotora</strong>

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarHeader">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                   <li class="nav-item">
                        <a href="buscar.php" class="nav-link">Agregar Vendedor</a>
                    </li>
                    <li class="nav-item">
                        <a href="agregarcliente.php" class="nav-link">Agregar Cliente </a>
                    </li>
                    <li class="nav-item">
                        <a href="listarall.php" class="nav-link">Listado de Vendedores </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Listado de Vehiculos </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Listado de Clientes </a>
                    </li>
                </ul>
                <form method="post">
                    <button name='cerrar' type="submit" class="btn btn-primary btn-block btn-large">Cerrar session</button>
                </form>
            </div>
        </div>
    </div>
</header>

<body>
    <div class="container">
        <div name="centrado" style="text-align: center;">
            <table name="centrado" style="margin: 5px auto;border: 1px #000000 solid; width:50%; background-color: white;">
                <form method="post">
                    <tbody>
                        <tr>
                            <td style="border: 2px #f3f3f3 solid">Cedula</td>
                            <td style="border: 2px #f3f3f3 solid">Nombre</td>
                            <td style="border: 2px #f3f3f3 solid">Apellido</td>
                            <td style="border: 2px #f3f3f3 solid">Direccion</td>
                            <td style="border: 2px #f3f3f3 solid">Telefono</td>
                            <td style="border: 2px #f3f3f3 solid">Comision</td>
                        </tr>
                        <?php for ($i = 0; $i < $cant_filas; $i++) {
                            $fila = mysqli_fetch_array($resultado);
                        ?>

                            <tr>
                                <td style="border: 2px #f3f3f3 solid"><?php echo $fila['ci'] ?></td>
                                <td style="border: 2px #f3f3f3 solid"><?php echo $fila['nombre'] ?></td>
                                <td style="border: 2px #f3f3f3 solid"><?php echo $fila['apellido'] ?></td>
                                <td style="border: 2px #f3f3f3 solid"><?php echo $fila['telefono'] ?></td>
                                <td style="border: 2px #f3f3f3 solid"><?php echo $fila['direccion'] ?></td>
                                <td style="border: 2px #f3f3f3 solid"><?php echo $fila['comision'] ?></td>
                            </tr>
                    </tbody>
                <?php } ?>
                </form>
            </table>
        </div>
    </div>
</body>

</html>