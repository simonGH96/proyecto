<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en"> 

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consejerías UD</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/proyecto/proyecto/Assets/css/Style.css">
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <!-- <link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">-->
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">


            <a class="navbar-brand"><img src="../Assets/images/logo_ud.png" alt="Logo" style="height: 60px;"></a>
            <!-- Contenido de la barra de navegación -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="../Views/index.php" id="navbarDropdownMenuLink" role="button">
                            Inicio
                        </a>
                    </li>
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true ) : ?>
                    <li class="nav-item ">
                        <a class="nav-link " href="../Views/estudiantes.php" role="button">
                            Estudiantes
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="../Models/planes_de_trabajo.php"  role="button">
                            Planes de trabajo
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['user']['rol']) && $_SESSION['user']['rol'] === 'admin') : ?>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Gestión
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="../Models/add_subject.php">Agregar asignatura</a></li>
                            <li><a class="dropdown-item" href="../Models/add_transport.php">Agregar Transporte</a></li>
                            <li><a class="dropdown-item" href="../Models/add_city.php">Agregar ciudad</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item ">
                        <a class="nav-link " href="../Views/Estadisticas.php" role="button" >
                            Informes
                        </a>
                    </li>
                    <?php if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in'] === true) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="../Views/login.php"  role="button"  aria-expanded="false">
                                Entrar
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="../Models/cerrar_sesion.php"  role="button"  aria-expanded="false">
                                Cerrar sesión
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>


        </div>
    </nav>
    <content>
    </content>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>