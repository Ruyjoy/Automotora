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
//Agregar Vehiculo
if (isset($_POST['crear'])) {

    
    $marca= $_POST['marca'];
    $modelo = $_POST['modelo'];
    $matricula= $_POST['matricula'];
    $km = $_POST['km'];
    $precio = $_POST['precio'];
    $anio = $_POST['anio'];
    

    $consulta = "INSERT INTO vehiculo(marca, modelo, matricula, km, precio, anio, disponible )VALUES ('$marca', '$modelo', '$matricula',  $km,  $precio,  '$anio',  1)";
    $resultado = mysqli_query($con, $consulta);

    //Si existe en base de datos -------
    if ($resultado == true) {
        echo "<script>alert('Se a Agregado correcatamente, actualice la p\u00E1gina para ver los cambios'); window.location='listavehiculo.php'</script>";
    } else {

        $alert = "error al ingresar datos";
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
                                        <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputCedula">Marca</label>
                                                        <input class="form-control py-4" name="marca" required="required" type="text" placeholder="Enter marca" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Modelo</label>
                                                        <input class="form-control py-4" name="modelo" required="required" type="text" placeholder="Enter modelo" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Matricula</label>
                                                        <input class="form-control py-4" name="matricula" required="required" type="text" placeholder="Enter matricula" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Kilometros</label>
                                                        <input class="form-control py-4" name="km" required="required" type="text" placeholder="Enter km" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Precio</label>
                                                        <input class="form-control py-4" name="precio" required="required" type="text" placeholder="Enter precio" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Año</label>
                                                        <input class="form-control py-4" name="anio" required="required" type="date" placeholder="Enter año" />
                                                    </div>
                                                </div>


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