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


 if ($cedu = $_GET['cedula'] == null) {
    header('location: buscar.php');}
     else if (is_numeric($_GET['cedula'])) {
    $cedu = $_GET['cedula'];} 
    else {
    header('location: buscar.php');
    $cedu = $_GET['cedula'];
    
}
$id = isset($_GET["cedula"]) ? $_GET["cedula"] : "";

if ($id == "" && $_SESSION['rol'] != 1) {
    $alert = "Error al prosesar la peticion";
    header('location: buscar.php');
} else {
    $consulta = "SELECT * FROM usuario where rol = 2 and ci = $cedu ";
    $resultado = mysqli_query($con, $consulta);

    $cant_filas = mysqli_num_rows($resultado);
    $fila = mysqli_fetch_array($resultado);
}
//-----------------------------  
//Editar

if (isset($_POST['Editar'])) {

    $cedula = $id;
    $pass = $_POST['pass'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['dir'];
    $telefono = $_POST['tel'];
    $comision = $_POST['comi'];

    $consulta = "UPDATE usuario  SET pass = '$pass', nombre = '$nombre', apellido = '$apellido', direccion = '$direccion', telefono = $telefono, comision =  $comision, rol = 2 Where ci = $cedula";
    $resultado = mysqli_query($con, $consulta);

    //Si existe en base de datos -------
    if ($resultado == true) {
        echo"<script>alert('Se a actualizado los cambios correcatamente, acutalice la p\u00E1gina para ver los cambios'); window.location=''</script>";
        
    } else {

        $alert = "error";
    }
}
//-----------------------------  

//Eliminar vendedor
if (isset($_POST['Eliminar'])) {

    $cedula = $id;
    
    $consulta = "DELETE FROM usuario WHERE ci = $cedula ";
    $resultado = mysqli_query($con, $consulta);

    //Si existe en base de datos -------
    if ($resultado == true ) {
        echo"<script>alert('Se a Eliminado correcatamente, favor de  actualizar la p\u00E1gina para ver los cambios'); window.location='listarall.php'</script>";
        
    } else {

        $alert = "error";
    }
}
//----------------------------- 

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
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
                        <a href="buscar.php" class="nav-link">Agregar Vendedor</a>
                    </li>
                    <li class="nav-item">
                        <a href="agregarcliente.php" class="nav-link">Agregar Cliente </a>
                    </li>
                    <li class="nav-item">
                        <a href="listarall.php" class="nav-link">Listado de Vendedores </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Listado de Vehiculos </a>
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
    <div class="container">
        <div name="centrado" style="text-align: center;">

            <form method="post">





                <table name="centrado" style="margin: 5px auto;border: 1px #000000 solid; width:50%; background-color: white;">
                    <tbody>
                        <tr>
                            <td style="border: 2px #f3f3f3 solid">Cedula</td>
                            <td style="border: 2px #f3f3f3 solid">Password</td>
                            <td style="border: 2px #f3f3f3 solid">Nombre</td>
                            <td style="border: 2px #f3f3f3 solid">Apellido</td>
                            <td style="border: 2px #f3f3f3 solid">Direccion</td>
                            <td style="border: 2px #f3f3f3 solid">Telefono</td>
                            <td style="border: 2px #f3f3f3 solid">Comision</td>
                            <td style="border: 2px #f3f3f3 solid">Operacion</td>
                            <td style="border: 2px #f3f3f3 solid">Operacion</td>
                        </tr>
                        

                            <tr>
                                <td style="border: 2px #f3f3f3 solid"><?php echo $fila['ci'] ?></td>

                                <td style="border: 2px #f3f3f3 solid"><input type="text" name="pass" class="table__item__link" value="<?php echo $fila['pass'] ?>" /></td>
                                <td style="border: 2px #f3f3f3 solid"><input type="text" name="nombre" class="table__item__link" value="<?php echo $fila['nombre'] ?>" /></td>
                                <td style="border: 2px #f3f3f3 solid"><input type="text" name="apellido" class="table__item__link" value="<?php echo $fila['apellido'] ?>" /></td>
                                <td style="border: 2px #f3f3f3 solid"><input type="text" name="dir" class="table__item__link" value="<?php echo $fila['direccion'] ?>" /></td>
                                <td style="border: 2px #f3f3f3 solid"><input type="text" name="tel" class="table__item__link" value="<?php echo $fila['telefono'] ?>" /></td> 
                                <td style="border: 2px #f3f3f3 solid"><input type="text" name="comi" class="table__item__link" value="<?php echo $fila['comision'] ?>" /></td>

                                <td style="border: 2px #f3f3f3 solid"><input type="submit" class="table__item__link" value="Editar" name="Editar"></td>
                                <td style="border: 2px #f3f3f3 solid"><input type="submit" class="table__item__link" value="Eliminar" name="Eliminar"></td>

                            </tr>
                        
                    </tbody>

                </table>
                <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

            </form>
        </div>
    </div>
</body>

</html>