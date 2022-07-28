<?php


session_start();

    if (isset($_GET['cerrar_sesion'])) {
        
        session_unset();
        session_destroy();
    }
    
    function page($se){
        switch($se){
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
    <link rel="stylesheet" href="Css/style.css">
    <title>Document</title>
</head>

<body>

    <div class="login">
        <h1>Login</h1>
        <form method="post">
            <input type="number" name="c" placeholder="Cedula" required="required" pattern="[0-9]+" />
            <input type="password" name="p" placeholder="Password" required="required" />
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <button name='enviar' type="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
        </form>
    </div>

</body>

</html>