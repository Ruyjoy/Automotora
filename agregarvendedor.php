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
//Agregar vendedor
if (isset($_POST['crear'])) {

    $cedula = $_POST['cedula'];
    $pass = $_POST['pass'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['dir'];
    $telefono = $_POST['tel'];
    $comision = $_POST['com'];

    $consulta = "INSERT INTO usuario(ci, pass, nombre, apellido, direccion, telefono, comision, rol )VALUES ($cedula, '$pass', '$nombre',  '$apellido',  '$direccion',  $telefono,  $comision, 2)";
    $resultado = mysqli_query($con, $consulta);

    //Si existe en base de datos -------
    if ($resultado == true) {
        echo"<script>alert('Se a Agregado correcatamente, actualice la p\u00E1gina para ver los cambios'); window.location='listarall.php'</script>";
        
    } else {

        $alert = "error";
    }
}

//-----------------------------     


?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="presentacion/style.css">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/style.css">
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
                        <a href="agregarvendedor.php" class="nav-link">Listado de Vehiculos </a>
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

<div class="login">
        <h1>Panel</h1>
        <form method="post">
        
            <input type="text" name="cedula" placeholder="Cedula" required="required" class="mt-3" />
            <input type="password" name="pass" placeholder="Password" required="required" class="mt-3"/>
            <input type="text" name="nombre" placeholder="Nombre" required="required" class="mt-3" />
            <input type="text" name="apellido" placeholder="Apellido" required="required" class="mt-3">
            <input type="text" name="dir" placeholder="Direccion" required="required"class="mt-3" />
            <input type="text" name="tel" placeholder="Telefono" required="required" class="mt-3" />
            <input type="text" name="com" placeholder="Comision" required="required" class="mt-3" />
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <button name='crear' type="submit" class="btn btn-primary">Crear</button>

        </form>
    </div>
</body>

</html>