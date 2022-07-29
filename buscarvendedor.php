<?php


/* iniciar la sesión */
session_start();
include "config/database.php";
$db = new Database();
$con = $db->conectar();

$yesno = "hidden";



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
        $yesno = "submit";
    }
}


//-----------------------------
// Si o no

if (isset($_POST['si'])) {

    header("location: agregarvendedor.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"><!-- Bootstrap CSS -->

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
                        <a href="buscarvendedor.php" class="nav-link">ABMVendedor</a>
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

    <body class="cuerpo">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Buscar Vendedor</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Cedula</label>
                                                <input class="form-control py-4" name="cedula" required="required" type="number" placeholder="Enter Cedula" />
                                            </div>
                                            <div class="form-group mt-4 mb-0">
                                                <button class="btn btn-primary btn-block" name="buscar">Buscar</button>
                                            </div>
                                        </form>

                                    </div>
                                



                                </div>

                                <div class="container" style="text-align: center;">
                                        <div class="">
                                            <form method="post">
                                                <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
                                                <input name="si" type=<?php echo $yesno ?> value="Yes" class="btn btn-primary btn-block " ; />
                                                <input name="no" type=<?php echo $yesno ?> value="no" class="btn btn-primary btn-block" ; />
                                            </form>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </body>
</body>



</html>