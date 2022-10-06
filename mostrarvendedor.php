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
//cerrar Session
if (isset($_POST['cerrar'])) {

    session_unset();
    session_destroy();
    header('location: index.php');
}
//-----------------------------


if ($cedu = $_GET['cedula'] == null) {
    header('location: buscar.php');
} else if (is_numeric($_GET['cedula'])) {
    $cedu = $_GET['cedula'];
} else {
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
        echo "<script>alert('Se a actualizado los cambios correcatamente, acutalice la p\u00E1gina para ver los cambios'); window.location=''</script>";
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
    if ($resultado == true) {
        echo "<script>alert('Se a Eliminado correcatamente, favor de  actualizar la p\u00E1gina para ver los cambios'); window.location='listavendedores.php'</script>";
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

    <link rel="stylesheet" href="CSS/styles.css">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<!--Barra de navegación-->
<?php include "barradenavegacion.php"; ?>

<body class="cuerpo">
    <div class="container">
        <div name="centrado" style="text-align: center;">

            <form method="post">

                &nbsp;
                <table class="table table-striped table-bordered text-white dt-responsive nowrap">
                    <tbody>
                        <tr>
                            <th>Cedula</th>
                            <th>Password</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Comision</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>


                        <tr>
                            <td><input type="text" name="pass" class="form-control-plaintext" required="required" value="<?php echo $fila['ci'] ?>"disabled  /></td>
                            <td><input type="text" name="pass" class="form-control-plaintext" required="required" value="<?php echo $fila['pass'] ?>" /></td>
                            <td><input type="text" name="nombre" class="form-control-plaintext" required="required" value="<?php echo $fila['nombre'] ?>" /></td>
                            <td><input type="text" name="apellido" class="form-control-plaintext" required="required" value="<?php echo $fila['apellido'] ?>" /></td>
                            <td><input type="text" name="dir" class="form-control-plaintext" required="required" value="<?php echo $fila['direccion'] ?>" /></td>
                            <td><input type="text" name="tel" class="form-control-plaintext" required="required" value="<?php echo $fila['telefono'] ?>" /></td>
                            <td><input type="text" name="comi" class="form-control-plaintext" required="required" value="<?php echo $fila['comision'] ?>" /></td>

                            <td><button type="submit"  class="btn btn-warning" value="Editar" name="Editar"><i class="fas fa-edit"></i></button></td>
                            <td><button type="submit" class="btn btn-danger" value="Eliminar" name="Eliminar"><i class="fas fa-trash" ></i></button></td>

                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js" integrity="sha512-8pHNiqTlsrRjVD4A/3va++W1sMbUHwWxxRPWNyVlql3T+Hgfd81Qc6FC5WMXDC+tSauxxzp1tgiAvSKFu1qIlA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>


</html>