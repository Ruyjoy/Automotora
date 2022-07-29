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
        echo "<script>alert('Se a Agregado correcatamente, actualice la p\u00E1gina para ver los cambios'); window.location='listarall.php'</script>";
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
    <link rel="stylesheet" href="Css/styles.css">
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

    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputCedula">Cedula</label>
                                                        <input class="form-control py-4" name="cedula" required="required" type="text" placeholder="Enter cedula" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Password</label>
                                                        <input class="form-control py-4" name="pass" required="required" type="text" placeholder="Enter password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Nombre</label>
                                                        <input class="form-control py-4" name="nombre" required="required" type="text" placeholder="Enter nombre" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Apellido</label>
                                                        <input class="form-control py-4" name="ape" required="required" type="text" placeholder="Enter apellido" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Direccion</label>
                                                        <input class="form-control py-4" name="dir" required="required" type="text" placeholder="Enter direccion" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Telefono</label>
                                                        <input class="form-control py-4" name="tel" required="required" type="text" placeholder="Enter telefono" />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Comision</label>
                                                <input class="form-control py-4" name="comi" required="required" type="number"  placeholder="Enter comision" />
                                            </div>
                                            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
                                            <div class="form-group mt-4 mb-0">
                                                <button class="btn btn-primary btn-block" name ="crear" >Create Account</button>
                                            </div>
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