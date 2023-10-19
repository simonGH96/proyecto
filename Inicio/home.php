<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Página Educativa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        /* Estilo para el menú desplegable */
        #lista {
            display: none;
            position: absolute;
            background-color: #fff;
            border: 1px solid #ccc;
            list-style: none;
            padding: 0;
        }

        #lista li {
            padding: 5px 10px;
            cursor: pointer;
        }

        /* Agregar un efecto de sombra al menú desplegable */
        #lista {
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <header>
        <h1>Consejerías Universidad Distrital FJC</h1>
        <nav>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="../estudiantes.php">Estudiantes</a></li>
                <li><a href="../formato.php">Planes de trabajo</a></li>
                <li><a href="../informes.php">Informes</a></li>
            </ul>
            <ul id="user-menu">
                <li><a href="#" id="logout-button"><i class="fas fa-user-circle"></i></a></li>
            </ul>
            </nav>
    </header>
    
    <ul id="lista">
        <li>Salir</li>
    </ul>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const logoutButton = document.getElementById('logout-button');
            const lista = document.getElementById('lista');

            // Mostrar/ocultar el menú desplegable al hacer clic en el botón
            logoutButton.addEventListener('click', function (e) {
                e.preventDefault();
                if (lista.style.display === 'block') {
                    lista.style.display = 'none';
                } else {
                    lista.style.display = 'block';
                }
            });
        });
    </script>
    <main>
        <section class="intro">
            <h2>¿Quiénes somos?</h2>
            <p>Somos la consejería académica de la Universidad Distrital, encargados del proceso permanente y continuo de acompañamiento a sus estudiantes. </br>
            Estas inician en el momento en que el estudiante se matricula en un proyecto curricular y se sostiene durante el tiempo que el estudiante permanezca en la universidad. </br>
            </br></p>
        </section>
        
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
    </main>

    <footer>
        <p>Pie de Página - © 2023 Página Educativa</p>
    </footer>
</body>
</html>
