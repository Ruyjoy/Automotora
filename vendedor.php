
<?php
session_start();

if (!isset($_SESSION['rol'])) {

    header('location: login.php');

}else if($_SESSION['rol'] != 2) {

    header('location: login.php');
}

if (isset($_GET['cerrar_sesion'])) {
    
    session_unset();
    session_destroy();
}

if (isset($_POST['cerrar'])) {

    session_unset();
    session_destroy();
    header('location: login.php');

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendedores</title>
</head>
<body>
    <h1> Vendedor </h1>
    <form method="post">
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <button name = 'cerrar' type="submit" class="btn btn-primary btn-block btn-large">Cerrar session</button>
        </form>


</body>
</html>