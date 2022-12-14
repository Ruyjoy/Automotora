<?php


/* iniciar la sesión */
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
    header('location: index.php');
}
if ($cedu = $_GET['cli_ci'] == null) {
     header('location: buscarcliente.php');
    }else if (is_numeric($_GET['cli_ci'])) {
    $cedu = $_GET['cli_ci'];} 
    else {
    header('location: buscar.php');
    $cedu = $_GET['cli_ci'];
    
}
$id = isset($_GET["cli_ci"]) ? $_GET["cli_ci"] : "";

if ($id == "" && $_SESSION['rol'] != 1) {
    $alert = "Error al prosesar la peticion";
    header('location: buscar.php');
}

//-----------------------------
//Agregar cliente
if (isset($_POST['crear'])) {

    $cedula = $cedu;
    $nombre = $_POST['nombre'];
    $apellido = $_POST['ape'];
    $direccion = $_POST['dir'];
    $telefono = $_POST['tel'];
    


    $consulta = "INSERT INTO cliente(cli_ci, cli_nombre, cli_apellido, cli_direccion, cli_telefono)VALUES ($cedula, '$nombre',  '$apellido',  '$direccion', $telefono)";
    $resultado = mysqli_query($con, $consulta);

    //Si existe en base de datos -------
    if ($resultado == true) {
        echo "<script>alert('Se a Agregado correcatamente, actualice la p\u00E1gina para ver los cambios'); window.location='lisadocliente.php'</script>";
    } else {

        $alert = "error";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="CSS/styles.css">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/styles.css">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>


<!--Barra de navegación-->
<?php include "barradenavegacion.php";?>


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
                                        <h3 class="text-center font-weight-light my-4">Create Cliente</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Cedula</label>
                                                        <input class="form-control py-4" name="nombre" required="required" type="text" placeholder=<?php echo $cedu?> disabled />
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
                                                        <input class="form-control py-4" name="tel" required="required" type="number" placeholder="Enter telefono" />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
                                            <div class="form-group mt-4 mb-0">
                                                <button class="btn btn-primary btn-block" name="crear">Create Account</button>
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