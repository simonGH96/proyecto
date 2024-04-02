<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/proyecto/proyecto/Assets/css/indexStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Flamenco:wght@300;400&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <?php
// Incluye el encabezado
require '../Views/header.php';
?>
    </header>
    <main>
    <section class="contenedor intro-UD">
        <h4 class="titulo-principal">¿Quiénes somos?</h4>

        <p>Somos la consejería académica de la Universidad Distrital, encargados del proceso permanente y continuo
            de acompañamiento a sus estudiantes. 
            Estas inician en el momento en que el estudiante se matricula en un proyecto curricular y se sostiene
            durante el tiempo que el estudiante permanezca en la universidad.
            </p>

    </section>
   
        <section class="contenedor info-relevante">
            <h2 class="titulo"> Información relevante</h2>
            <div class="contenedor-info-relevante">
                <img src="../Assets/images/imagen-noticia.jpg" class="imagen-about-us">
                <div class="contenido-textos">
                    <h3><span>*</span>Evento</h3>
                    <p>Evento de socialización de la guia del docente consejero.
                        <a
                            href="https://viceacad.udistrital.edu.co/noticia/guia-para-el-docente-consejero-una-oportunidad-de-fortalecer-las-consejerias-en-la-ud">Más
                            información
                        </a></p>
                    <h3><span>*</span>Descripción</h3>
                    <p>La universidad distrital ofrece charlas de socialiazación sobre el trabajo de las consejerias
                        dentro de la universidad, guiando
                        a los docentes y estudiantes en un camino de acompañamiento optimo. No te lo pierdas.</p>
                </div>
            </div>
            <div class="contenedor-info-relevante">
                <img src="../Assets/images/resolucion.jpg" class="imagen-about-us">
                <div class="contenido-textos">
                    <h3><span>*</span>Normatividad</h3>
                    <p>Tiene por objeto, elevar el desarrollo académico y humano de los estudiantes, de manera que
                        permita identificar las diversas situaciones que puede afrontar un estudiante en el transcurso
                        de su formación universitaria, bien sean académicas, socioeconómicas, de aprendizaje,
                        emocionales, etc.
                        <a href="https://sgral.udistrital.edu.co/xdata/ca/res_2011-040.pdf">Más
                            información
                        </a></p>
                </div>
            </div>
        </section>

        <section class="clientes contenedor">
            <h2 class="titulo">Que dicen nuestros asesorados</h2>
            <div class="cards">
                <div class="card">
                    <img src="../Assets/images/Menta.jpg" alt="">
                    
                        <h4>Name</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, tenetur.</p>
                    
                </div>

                <div class="card">
                    <img src="../Assets/images/Valentin.jpg" alt="">
                    
                        <h4>Name</h4>
                        <p>Lore ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, tenetur.</p>
                   
                </div>
            </div>
        </section>

    </main>
    <footer>
        <p>@consejerias_UD</p>
    </footer>
</body>

</html>