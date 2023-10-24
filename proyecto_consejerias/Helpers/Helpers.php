<?php
    
    function baseUrl(){
        return BASE_URL;
    }

    function forumUrl(){
        return FORUM_URL;
    }

    function media(){
        return BASE_URL."Assets";
    }

    function dep($data)
    {
        $format  = print_r('<pre>');
        $format .= print_r($data);
        $format .= print_r('</pre>');
        return $format;
    }

    function pageHeader($data=""){        
        $viewHeader = "Views/Template/Header.php";
        require_once($viewHeader);
    }


    function pageHeaderLogin($data=""){
        $viewHeader = "Views/Template/HeaderLogin.php";
        require_once($viewHeader);
    }


    function pageHeaderLoginConsejerias($data=""){
        $viewHeader = "Views/Template/HeaderLoginConsejerias.php";
        require_once($viewHeader);
    }


    function footer($data=""){
        $viewFooter = "Views/Template/Footer.php";
        require_once($viewFooter);
    }

    function searchbarResult($data=""){
        $viewSearchbar = "Views/Template/SearchBarResult.php";
        require_once($viewSearchbar);
    }

    function searchbarCounseling($data=""){
        $viewSearchbar = "Views/Template/SearchBarCounseling.php";
        require_once($viewSearchbar);
    }

    function searchbarConceptual($data=""){
        $viewSearchbar = "Views/Template/SearchBarConceptual.php";
        require_once($viewSearchbar);
    }

    function searchbarObject($data=""){
        $viewSearchbar = "Views/Template/SearchBarObject.php";
        require_once($viewSearchbar);
    }

    function searchbarThinking($data=""){
        $viewSearchbar = "Views/Template/SearchBarThinking.php";
        require_once($viewSearchbar);
    }

    function searchbarResource($data=""){
        $viewSearchbar = "Views/Template/SearchBarResource.php";
        require_once($viewSearchbar);
    }

    function getModal(string $nameModal, $data){
        $viewModal = "Views/Template/Modals/{$nameModal}.php";
        require_once($viewModal);
    }

    function strClean($strChain){
        $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strChain);
        $string = trim($string);
        $string = stripslashes($string);
        $string = str_ireplace("<script>","",$string);
        $string = str_ireplace("</script>","",$string);
        $string = str_ireplace("<script src>","",$string);
        $string = str_ireplace("<script type=>","",$string);
        $string = str_ireplace("SELECT * FROM","",$string);
        $string = str_ireplace("DELETE FROM","",$string);
        $string = str_ireplace("INSERT INTO","",$string);
        $string = str_ireplace("SELECT COUNT(*) FROM","",$string);
        $string = str_ireplace("DROP TABLE","",$string);
        $string = str_ireplace("OR '1'='1","",$string);
        $string = str_ireplace('OR "1"="1"',"",$string);
        $string = str_ireplace('OR ´1´=´1´',"",$string);
        $string = str_ireplace("IS NULL; --","",$string);
        $string = str_ireplace("LIKE '","",$string);
        $string = str_ireplace('LIKE "',"",$string);
        $string = str_ireplace("LIKE ´","",$string);
        $string = str_ireplace("OR 'a'='a","",$string);
        $string = str_ireplace('OR "a"="a',"",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("--","",$string);
        $string = str_ireplace("^","",$string);
        $string = str_ireplace("[","",$string);
        $string = str_ireplace("]","",$string);
        $string = str_ireplace("==","",$string);
        return $string;
    }

    function optionsAreaAnalysis(){
        $areas =[
            "1" => "Componente propedéutico",
            "2" => "Componente del área de Ciencias Básicas",
            "3" => "Componente del área básica de Ingeniería",
            "4" => "Componente del área de Ingeniería Aplicada",
            "5" => "Componente del área Sociohumanística",
            "6" => "Componente del área Economico Administrativa",
            "7" => "Componente de Segunda Lengua",
        ];
        return $areas;
    }

    function optionsAreaGraduated(){
        $areas =[
            "1" => "Desarrollador de Software o especialista en una herramienta de Desarrollo",
            "2" => "Consultorias",
            "3" => "Gestión y administración de Proyectos",
            "4" => "Analista y Profesional de Requerimientos o planeador",
            "5" => "Infraestructura Redes y Tecnología seguridad o monitoreo",
            "6" => "Soporte y Procesamiento",
            "7" => "QA, Pruebas, funcionalidades, automatización o calidad o analista de calidad",
            "8" => "Arquitecto o Ingeniero de Software",
            "9" => "Desa Empresarial, Planea, Administra Sistemas, Gerente Operaciones, Analys procesos o experto Govierno TI",
            "10" => "Lider de Desarrollo",
            "11" => "Virtualización Entrega y Seguimiento de Software, Plataforma o DevOPS",
            "12" => "Gestión de Personal e Ingeniero CEO",
            "13" => "Implantación y Despliegue de Soluciones, DevOPS o Cloud",
            "14" => "Servicio al Cliente Servicios y Contingencias",
            "15" => "Marketing Front End y Relación con Clientes",
            "16" => "Gestor de Tecnologías",
            "17" => "Inteligencia de Negocios, analista de BD o Machine Learning",
            "18" => "Docencia",
            "19" => "Bases de Datos o Backend",
            "20" => "Procesamiento de Imágenes, Diseñador gráfico, de contendos, generador de Sistemas gráficos y Georeferenciación",
            "21" => "Sistemas distribuidos",
            "22" => "Ingeniero IoT",
            "23" => "Ingeniero de Integración",
            "24" => "Arquitecto BlockChain",
            "25" => "Estimador de Costos",
        ];
        return $areas;
    }
?>
    
    