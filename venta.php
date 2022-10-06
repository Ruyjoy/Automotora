<?php


/* iniciar la sesión */
session_start();
include "config/database.php";
$db = new Database();
$con = $db->conectar();



//control de roles por session 
if (!isset($_SESSION['rol'])) {

    header('location: login.php');
} else if ($_SESSION['rol'] == 1) {

    $barra = include "barradenavegacion.php";
} else {
    $barra = include "barradenavegacionvendedro.php";;
}
//-----------------------------
//Cerrar Session
if (isset($_POST['cerrar'])) {

    session_unset();
    session_destroy();
    header('location:index.php');
}
//-----------------------------
// Llenar select

$string = "SELECT * FROM vehiculo";
$ejecucion = mysqli_query($con, $string);

$consultacliente = "SELECT * FROM cliente";
$ejecucioncliente = mysqli_query($con, $consultacliente);

//-----------------------------
//Agregar venta
if (isset($_POST['crear'])) {

    $cliente = $_POST['idCliente'];
    $cedula = $_SESSION['ci'];
    $veh = $_POST['idvehiculo'];
    $fecha = $_POST['anio'];


    foreach ($ejecucion as $opciones) :
        if ($opciones['id'] == $veh) {
            $precio = $opciones['precio'];
        }
    endforeach;
    


    $consulta = "INSERT INTO venta(cli, vend, veh, fecha, precio)VALUES ($cliente, $cedula, $veh, '$fecha', $precio)";
    $resultado = mysqli_query($con, $consulta);

    //Si existe en base de datos -------
    if ($resultado == true) {
        echo "<script>alert('Se a Agregado correcatamente, actualice la p\u00E1gina para ver los cambios'); window.location='listadeventas.php'</script>";
    } else {

        $alert = "error";
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
    <link rel="stylesheet" href="Css/styles.css">
    <title>Crear una venta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>


<!--Barra de navegación-->
<?php $barra; ?>


<body class="cuerpo">

    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Crear Venta</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Cliente</label>
                                                        <select name="idCliente" class="form-control">

                                                            <?php foreach ($ejecucioncliente as $opcionescliente) : ?>
                                                                <option value="<?php echo $opcionescliente['cli_ci'] ?>"><?php echo " Cedula : " . $opcionescliente['cli_ci'] . " ----- Nombre : " . $opcionescliente['cli_nombre'] ?></option>

                                                            <?php endforeach ?>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Fecha</label>
                                                        <input class="form-control " name="anio" required="required" type="date" placeholder="Enter Fecha" />
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Vehiculo</label>
                                                <select name="idvehiculo" class="form-control">

                                                    <?php foreach ($ejecucion as $opciones) : ?>

                                                        <option value="<?php echo $opciones['id'] ?>"><?php echo " Id : " . $opciones['id'] . " ---------------- Marca : " . $opciones['marca']." ---------------- Precio : $".$opciones['precio'] ?></option>

                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
                                            <div class="form-group mt-4 mb-0">
                                                <button class="btn btn-primary btn-block" name="crear">Vender</button>
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