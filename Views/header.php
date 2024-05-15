<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en"> 

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/proyecto/proyecto/Assets/css/Style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
    <title>Consejerías UD</title>


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
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link " href="../Views/estudiantes.php" role="button">
                            Estudiantes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                            <li><a class="dropdown-item" href="http://www.sistematizaciondatos.com.dream.website/resultados/arq/val/validar2.php" target="_blank">Diligenciar Encuesta</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="../Models/planes_de_trabajo.php" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Planes de trabajo
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                            <li><a class="dropdown-item" href="http://www.sistematizaciondatos.com.dream.website/resultados/arq/val/validar2.php" target="_blank">Diligenciar Encuesta</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="../Models/add_student.php" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Gestión
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                            <li><a class="dropdown-item" href="http://www.sistematizaciondatos.com.dream.website/resultados/arq/val/validar2.php" target="_blank">Diligenciar Encuesta</a></li>
                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link " href="../Views/Estadisticas.php" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Informes
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                            <li><a class="dropdown-item" href="http://www.sistematizaciondatos.com.dream.website/resultados/arq/val/validar2.php" target="_blank">Diligenciar Encuesta</a></li>
                        </ul>
                    </li>
                    <?php if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in'] === true) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="../Views/login.php" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Entrar
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                                <li><a class="dropdown-item" href="http://www.sistematizaciondatos.com.dream.website/resultados/arq/val/validar2.php" target="_blank">Diligenciar Encuesta</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="../Models/cerrar_sesion.php" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Cerrar sesión
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                                <li><a class="dropdown-item" href="http://www.sistematizaciondatos.com.dream.website/resultados/arq/val/validar2.php" target="_blank">Diligenciar Encuesta</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>


        </div>
    </nav>
    <content>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const logoutButton = document.getElementById('logout-button');
                const logoutOption = document.getElementById('logout-option');

                // Función para redirigir al usuario a "login.html"
                function redirectToLogin() {
                    window.location.href = 'login.html';
                }
                // Mostrar/ocultar el menú desplegable al hacer clic en el botón
                logoutButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (lista.style.display === 'block') {
                        lista.style.display = 'none';
                    } else {
                        lista.style.display = 'block';
                    }
                });
                // Redirigir al hacer clic en "Salir"
                logoutOption.addEventListener('click', redirectToLogin);
            });
        </script>

</body>

</html>