<!--Barra de navegación-->

<head>
    <link rel="stylesheet" href="CSS/normal.css">

    <style>
        .navbar>.container1,
        .navbar>.container-fluid,
        .navbar>.container-lg,
        .navbar>.container-md,
        .navbar>.container-sm,
        .navbar>.container-xl,
        .navbar>.container-xxl {
            display: flex;
            flex-wrap: inherit;
            align-items: center;
            justify-content: space-between;
        }

        .container1 {
            width: 100%;
            padding-right: var(--bs-gutter-x, .75rem);
            padding-left: var(--bs-gutter-x, .75rem);
            margin-right: auto;
            margin-left: auto;
        }

        #srt {
            color: #f9f9f9;
            display: block;
            float: right;
            position: fixed;
            top: 14px;
            left: 180px;
            text-shadow: 1px 1px 0px #000;
            font-size: 36px;
            font-style: italic;
            font-family: ethno, sans-serif;
            font-weight: normal;
        }

        #ii {
            font-size: 60px;
            font-family: LeagueGothic, sans-serif;
            font-weight: bold;
            position: fixed;
            left: 169px;
            top: -3px;
            color: #b82924;
            display: block;
            float: right;
            text-shadow: none;
            font-style: italic;
            letter-spacing: 1px;
        }

        header h1 {
            font-family: LeagueGothic, Impact, sans-serif;
            font-weight: normal;
            text-transform: uppercase;
            font-size: 2.5em;
            text-shadow: 1px 1px 0 #000;
            position: relative;
            width: 300px;
            margin-bottom: 2px;
        }

        #logo {
            width: 270px;
        }
    </style>

</head>

<header>

    <div class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container1">
            <a href="administrador.php" class="navbar-brand">
                <div id="logo">
                    <h1><span id="ii">IIIIIIIII</span><span id="srt">JYB</span></h1>

                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarHeader">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="buscarvendedor.php" class="nav-link">Buscar Vendedor</a>
                    </li>
                    <li class="nav-item">
                        <a href="buscarcliente.php" class="nav-link">Buscar Cliente </a>
                    </li>
                    <li class="nav-item">
                        <a href="buscarvehiculo.php" class="nav-link">Buscar Vehiculo </a>
                    </li>
                    <li class="nav-item">
                        <a href="venta.php" class="nav-link">Hacer Venta </a>
                    </li>
                    <li class="nav-item">
                        <a href="listarvendedor.php" class="nav-link">Lista de Vendedores </a>
                    </li>
                    <li class="nav-item">
                        <a href="lisadocliente.php" class="nav-link">Lista de Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a href="listavehiculo.php" class="nav-link">Lista de Vehiculos </a>
                    </li>
                    <li class="nav-item">
                        <a href="listadeventas.php" class="nav-link">Lista Ventas </a>
                    </li>
                </ul>
                <form method="post">
                    <button name='cerrar' type="submit" class="btn btn-primary btn-block btn-large">Cerrar Sesión</button>
                </form>
            </div>
        </div>
    </div>
    <div class="">
        <div class="textocolor text-dark bg-secondary text-center ">Bienvenido al panel del Administrador.</div>
    </div>
</header>