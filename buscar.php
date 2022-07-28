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
//Cerrar Session
if (isset($_POST['cerrar'])) {

    session_unset();
    session_destroy();
    header('location: login.php');
}


//-----------------------------
//Buscar vendedor
if (isset($_POST['buscar'])) {

    $cedula = $_POST['cedula'];

    $consulta = "SELECT * FROM usuario Where ci = $cedula";
    $resultado = mysqli_query($con, $consulta);

    //Si existe en base de datos -------
    if ($fila = mysqli_fetch_assoc($resultado)) {

        if ($fila['rol'] == 2) {
            $id     = $fila['cedula'];
            header("location: mostrarvendedor.php?cedula=$cedula");
        } else {
            $alert = "Es un administrador no se puede modificar";
        }
    } else {

        $alert = "El vendedor no existe Puede agregarlo";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="presentacion/style.css">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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

    <div class="container" style="text-align: center;">
        <div class="activ">
            <h1>Panel</h1>
            <form method="post">
                <div class="input-group">
                    <input type="text" name="cedula" placeholder="Cedula" required="required" class="form-control" background="rgba(0,0,0,0.3)" ; />

                    <span class="input-group-btn">
                        <button name='buscar' type="submit" class="btn btn-primary ">Buscar</button>
                        </button>
                    </span>
                </div>

            </form>

        </div>
        <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
    </div>

</body>

</html>