<?php
    class AreaConceptualTools extends Controllers{

        public function __construct(){
            parent::__construct();
        }

        public function AreaConceptualTools(string $page){
            $page = intval(strClean($page));
            $data['page_tag'] = 'Herramientas Conceptuales por Área';
            $data['page_title'] = 'Herramientas Conceptuales por Área';
            $data['page_functions_js'] = "functions_area_conceptual_tools.js";
            $this->views->getView($this,"AreaConceptualTools",$data);
        }

        public function getSubjectByIdConceptual(int $codeCR){
            $arrData = $this->model->searchAllSubjectByCR($codeCR);
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
	    die();
        }
      
    }
?>