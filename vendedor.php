
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
    header('location: index.php');

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendedores</title>
    <link rel="stylesheet" href="Css/styles.css">
    <style>
        body{
            background-image: url('imagenes/fiat-mobi-2021.jpg');
            background-repeat: no-repeat;
            background-size: 100% 100%;          
        }
    </style>
   
   
</head>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"><!-- Bootstrap CSS -->
<body>

<!--Barra de navegación-->
<?php include "barradenavegacionvendedro.php";?>
    
</body>
</html>