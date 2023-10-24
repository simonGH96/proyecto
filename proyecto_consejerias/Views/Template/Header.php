<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $data['page_tag'];?></title>
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= baseUrl();?>"><img src="<?= media();?>/images/uploads/logo_ud.png" alt="Logo" style="height: 60px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <!--
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= baseUrl();?>learningResult">Análisis de Resultados</a>
                    </li>   -->

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Consejerias
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?= baseUrl();?>learningResult">Consejerias</a></li>
                            <li><a class="dropdown-item" href="<?= baseUrl();?>conceptualResult">Herramientas de consejerias</a></li>
                            <li><a class="dropdown-item" href="<?= baseUrl();?>objectResult">Objetos de Estudio</a></li>
                            <li><a class="dropdown-item" href="<?= baseUrl();?>thinkingResult">Pensamientos</a></li>
                            <li><a class="dropdown-item" href="<?= baseUrl();?>resourceResult">Recursos</a></li>
                            <li><a class="dropdown-item" href="<?= baseUrl();?>learningResult">Didácticas</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Análisis Consejerías
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?= baseUrl();?>AreaConceptualTools/AreaConceptualTools/1">Herramientas Conceptuales</a></li>
                            <li><a class="dropdown-item" href="<?= baseUrl();?>AreaLearningResult/AreaLearningResult/1">Resultados de Aprendizaje</a></li>
                            <li><a class="dropdown-item" href="<?= baseUrl();?>AreaStudyObject/AreaStudyObject/1">Obtejos de Estudio</a></li>
                            <li><a class="dropdown-item" href="<?= baseUrl();?>AreaResource/AreaResource/1">Recursos</a></li>
                            <li><a class="dropdown-item" href="<?= baseUrl();?>AreaThoughts/AreaThoughts/1">Pensamientos</a></li>
                        </ul>
                    </li>  

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Análisis Egresados
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?= baseUrl();?>EgreStatistics">Grafica Resumen Egresados</a></li>
                            <li><a class="dropdown-item" href="<?= baseUrl();?>EgreList/EgreList/1">Listado Cargos Egresados</a></li>
                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Resultados del Proyecto
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                            <li><a class="dropdown-item" href="<?= baseUrl();?>Statistics">Tratamiento estadístico de RA</a></li>
                            <li><a class="dropdown-item" href="<?= baseUrl();?>Statistics">Tratamiento estadístico de Herramientas Conceptuales</a></li>
                            <li><a class="dropdown-item" href="<?= baseUrl();?>Statistics">Tratamiento estadístico de Objetos de Estudio</a></li>
                            <li><a class="dropdown-item" href="<?= baseUrl();?>Statistics">Tratamiento estadístico de Pensamientos</a></li>
                            <li><a class="dropdown-item" href="<?= baseUrl();?>Statistics">Tratamiento estadístico de Recursos</a></li>
                            <li><a class="dropdown-item" href="<?= baseUrl();?>Statistics">Tratamiento estadístico de Didácticas</a></li>

                            <li><a class="dropdown-item" href="<?= baseUrl();?>VennPropBasicAplicated/VennPropBasicAplicated/1">Prope, Basic, Aplicada</a></li>
                            <li><a class="dropdown-item" href="<?= baseUrl();?>VennAdmBasicAplicated/VennAdmBasicAplicated/1">Admin, Basic, Aplicada</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Administrativo
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?= baseUrl();?>Login">Ingresar al sistema</a></li>
                            <li><a class="dropdown-item" href="<?= baseUrl();?>Login">Ingresar a consejerias</a></li>
                            <li><a class="dropdown-item" href="<?= baseUrl();?>SurveyStats/SurveyStats/1">Encuesta a estudiantes</a></li>
                            <li><a class="dropdown-item" href="<?= forumUrl();?>" target="_blank">Foro</a></li>
                            <li><a class="dropdown-item" href="http://www.sistematizaciondatos.com.dream.website/resultados/login/histo1.php" target="_blank">Desercion TSD</a></li>
                            <li><a class="dropdown-item" href="http://www.sistematizaciondatos.com.dream.website/resultados/login/histo2.php" target="_blank">Desercion IT</a></li>
                            <li><a class="dropdown-item" href="<?= baseUrl();?>NormativityTheme/NormativityTheme/1">Normatividad por Tema</a></li>
                            <li><a class="dropdown-item" href="<?= baseUrl();?>NormativityActor/NormativityActor/1">Normatividad por Actor</a></li>
                            <li><a class="dropdown-item" href="http://www.sistematizaciondatos.com.dream.website/resultados/arq/val/validar2.php" target="_blank">Diligenciar Encuesta</a></li>                            
                        </ul>
                    </li>

                </ul>
            </div>
            <a class="navbar-brand" href="<?= baseUrl();?>"><img src="<?= media();?>/images/uploads/chibchacum3.png" alt="Logo" style="height: 60px;"></a>
        </div>
    </nav>
    <content>
    