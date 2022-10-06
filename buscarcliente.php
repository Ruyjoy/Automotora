<?php


/* iniciar la sesión */
session_start();
include "config/database.php";
$db = new Database();
$con = $db->conectar();


$cedu = 0;



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
    header('location:index.php');
}


//-----------------------------
//Buscar cliente
if (isset($_POST['buscar'])) {

    $cedula = $_POST['cedula'];

    $consulta = "SELECT * FROM cliente Where cli_ci = $cedula";
    $resultado = mysqli_query($con, $consulta);

    //Si existe en base de datos -------
    if ($fila = mysqli_fetch_assoc($resultado)) {
        
        $id     = $fila['cli_ci'];
        header("location: mostrarcliente.php?cli_ci=$cedula");
    } else {


        header("location: agregarcliente.php?cli_ci=$cedula");
    }
}


//-----------------------------
// Si o no

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <title>Buscar Cliente</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"><!-- Bootstrap CSS -->

</head>


<!--Barra de navegación-->
<?php include "barradenavegacion.php"; ?>

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
                                        <h3 class="text-center font-weight-light my-4">Buscar Cliente</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Cedula</label>
                                                <input class="form-control py-4" name="cedula" required="required" type="number" placeholder="Ingrese Cedula" />
                                            </div>
                                            <div class="form-group mt-4 mb-0">
                                                <button class="btn btn-primary btn-block" name="buscar">Buscar</button>
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