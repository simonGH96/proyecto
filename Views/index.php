<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="../Assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
    <title>Consejerías UD</title>
    
    
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
        
            
        <a class="navbar-brand" ><img src="../Assets/images/logo_ud.png" alt="Logo" style="height: 60px;"></a>
        <!-- Contenido de la barra de navegación -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
            <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" >
                            Inicio
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                           
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="../Models/estudiantes.php" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Estudiantes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            
                            <li><a class="dropdown-item" href="http://www.sistematizaciondatos.com.dream.website/resultados/arq/val/validar2.php" target="_blank">Diligenciar Encuesta</a></li>                            
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="../Models/planes_de_trabajo.php" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Planes de trabajo
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            
                            <li><a class="dropdown-item" href="http://www.sistematizaciondatos.com.dream.website/resultados/arq/val/validar2.php" target="_blank">Diligenciar Encuesta</a></li>                            
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="../Models/informes.php" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Informes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            
                            <li><a class="dropdown-item" href="http://www.sistematizaciondatos.com.dream.website/resultados/arq/val/validar2.php" target="_blank">Diligenciar Encuesta</a></li>                            
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="../login.php" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Salir
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            
                            <li><a class="dropdown-item" href="http://www.sistematizaciondatos.com.dream.website/resultados/arq/val/validar2.php" target="_blank">Diligenciar Encuesta</a></li>                            
                        </ul>
                    </li>

            
        </ul>
            </div>
        
        
        </div>
    </nav>
    <content>
    <div id="contentLearningResults">
        <!-- Contenido de la sección de resultados de aprendizaje -->
        <a > Contenido de la sección de resultados de aprendizaje</a>
    </div>
    
    <div id="topPagination">
        <!-- Contenido de la parte superior de la paginación -->

        
    </div>
    
    <div class="card">
        <!-- Contenido de una tarjeta -->
        <a > Contenido de la tarjeta</a>

        <section class="intro">
            <h2>¿Quiénes somos?</h2>
            <p>Somos la consejería académica de la Universidad Distrital, encargados del proceso permanente y continuo de acompañamiento a sus estudiantes. </br>
            Estas inician en el momento en que el estudiante se matricula en un proyecto curricular y se sostiene durante el tiempo que el estudiante permanezca en la universidad. </br>
            </br></p>
        </section>
        <div class="card-body">
            <!-- Contenido de la tarjeta -->
            <a > Contenido de la tarjeta- body</a>

            <section class="featured-courses">
            <h2> Información relevante</h2>
            <div class="course">
                <img src="imagen-noticia.jpg" alt="Curso 1">
                <h3>Evento</h3>
                <p>Evento de socialización de la guia del docente consejero.</p>
                <a href="https://viceacad.udistrital.edu.co/noticia/guia-para-el-docente-consejero-una-oportunidad-de-fortalecer-las-consejerias-en-la-ud">Más información</a>
            </div>
            <div class="course">
                <img src="resolucion.jpg" alt="Curso 2">
                <h3>Resolución que define las consejerias</h3>
                <p>Tiene por objeto, elevar el desarrollo académico y humano de los estudiantes, de manera que permita identificar las diversas situaciones que puede afrontar un estudiante en el transcurso de su formación universitaria, bien sean académicas, socioeconómicas, de aprendizaje, emocionales, etc.</p>
                <a href="https://sgral.udistrital.edu.co/xdata/ca/res_2011-040.pdf">Más información</a>
            </div>
        </section>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const logoutButton = document.getElementById('logout-button');
            const logoutOption = document.getElementById('logout-option');

            // Función para redirigir al usuario a "login.html"
            function redirectToLogin() {
                window.location.href = 'login.html';
            }
            // Mostrar/ocultar el menú desplegable al hacer clic en el botón
            logoutButton.addEventListener('click', function (e) {
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
    <footer>
        <p>Pie de página -  holi corazoncito </p>
    </footer>
</body>
</html>
