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
    header('location: index.php');
}
//-----------------------------


if ($cedu = $_GET['cedula'] == null) {
    header('location: buscarvendedor.php');
} else if (is_numeric($_GET['cedula'])) {
    $cedu = $_GET['cedula'];
} else {
    header('location: buscarvendedor.php');
    $cedu = $_GET['cedula'];
}


//-----------------------------
//Agregar vendedor
if (isset($_POST['crear'])) {

    $cedula = $cedu;
    $pass = $_POST['pass'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['ape'];
    $direccion = $_POST['dir'];
    $telefono = $_POST['tel'];
    $comision = $_POST['comi'];

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
<link rel="stylesheet" href="CSS/styles.css">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<!--Barra de navegación-->
<?php include "barradenavegacion.php";?>

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
                                        <h3 class="text-center font-weight-light my-3">Create Account</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputCedula">Cedula</label>
                                                        <input class="form-control py-2" name="cedula" required="required" type="text" placeholder=<?php echo $cedu?> disabled />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Password</label>
                                                        <input class="form-control py-2" name="pass" required="required" type="text" placeholder="Enter password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Nombre</label>
                                                        <input class="form-control py-2" name="nombre" required="required" type="text" placeholder="Enter nombre" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Apellido</label>
                                                        <input class="form-control py-2" name="ape" required="required" type="text" placeholder="Enter apellido" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Direccion</label>
                                                        <input class="form-control py-2" name="dir" required="required" type="text" placeholder="Enter direccion" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Telefono</label>
                                                        <input class="form-control py-2" name="tel" required="required" type="number" placeholder="Enter telefono" />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Comision</label>
                                                <input class="form-control py-2" name="comi" required="required" type="number"  placeholder="Enter comision" />
                                            </div>
                                            <div class="form-group  mb-0">
                                                <button class="btn btn-primary btn-block" name ="crear" >Create Account</button>
                                            </div>
                                            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
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