<?php
    class EgreList extends Controllers{

        public function __construct(){
            parent::__construct();
        }

        public function EgreList(string $page){
            $page = intval(strClean($page));
            $data['page_tag'] = 'Egresados por Área';
            $data['page_title'] = 'Egresados por Área';
            $data['page_functions_js'] = "functions_area_graduated_tools.js";
            $this->views->getView($this,"EgreList",$data);
        }

        public function getSubjectByIdGraduated(int $codeCR){
            $arrData = $this->model->searchAllSubjectByCR($codeCR);
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
	    die();
        }
      
    }
?>