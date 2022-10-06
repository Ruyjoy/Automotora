<?php


session_start();

if (isset($_GET['cerrar_sesion'])) {

    session_unset();
    session_destroy();
}

function page($se)
{
    switch ($se) {
        case 1:
            header('location: administrador.php');
            break;
        case 2:
            header('location: vendedor.php');
            break;

        default:
    }
}

if (isset($_SESSION['rol'])) {
    page($_SESSION['rol']);
}

if (isset($_POST['enviar'])) {

    include "config/database.php";
    $db = new Database();
    $con = $db->conectar();

    $nombre = $_POST['c'];
    $pass = $_POST['p'];

    $consulta = "SELECT * FROM usuario Where ci = $nombre AND pass = '$pass'";
    $resultado = mysqli_query($con, $consulta);

    //Si existe en base de datos -------
    if ($fila = mysqli_fetch_assoc($resultado)) {


        $alert = "Estoy";
        // print_r($fila);

        $_SESSION['rol']       = $fila['rol'];
        $_SESSION['ci']       = $fila['ci'];

        //lo envido a su pagina-------
        page($_SESSION['rol']);
    } else {

        $alert = "Cedula o  Password son Incorrecto";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Panel de Ingreso</title>
</head>

<body class = "cuerpo">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="titu">
                            <h3 style= "color:#F5F5F5" class="text-center font-weight-light my-4 ">Login</h3>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputEmailAddress">Cedula</label>
                                    <input class="form-control py-4" required="required" type="number" name="c" placeholder="Cedula" pattern="[0-9]+" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="inputPassword">Password</label>
                                    <input class="form-control py-4" required="required" type="password" placeholder="Password" name="p" />
                                </div>
                                <div class="form-group">
                                <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
                                </div>

                                
                                <div class="form-group align-items-center justify-content-between mt-4 mb-0">
                                    <button name='enviar' type="submit" class="btn btn-primary btn-block">Ingresar</button>
                                    <input type="button" value="Regresar" class="btn btn-primary btn-block"
                                    onClick="window.location = 'index.php'" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>