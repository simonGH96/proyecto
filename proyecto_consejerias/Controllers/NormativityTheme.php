<?php
    class NormativityTheme extends Controllers{

        public function __construct(){
            parent::__construct();
        }

        public function NormativityTheme(string $page){
            $page = intval(strClean($page));
            $data['page_tag'] = 'Normas por Tema';
            $data['page_title'] = 'Normas por Tema';
            // $data['page_functions_js'] = "functions_area_conceptual_tools.js";
            $data['page_functions_js'] = "functions_norma_tema.js";
            $this->views->getView($this,"NormativityTheme",$data);
        }

        public function getSubjectByIdConceptual($codeCR){
            $arrData = $this->model->searchAllSubjectByCR($codeCR);
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
	    die();
        }
      
    }
?>