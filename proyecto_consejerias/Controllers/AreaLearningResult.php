<?php
    class AreaLearningResult extends Controllers{

        public function __construct(){
            parent::__construct();
        }

        public function AreaLearningResult(string $page){
            $page = intval(strClean($page));
            $data['page_tag'] = 'Resultados de consejerias por Área';
            $data['page_title'] = 'Resultados de Consejerias por Área';
            $data['page_functions_js'] = "functions_area_learning_result.js";
            $this->views->getView($this,"AreaLearningResult",$data);
        }

        public function getSubjectById(int $codeCR){
            $arrData = $this->model->searchAllSubjectByLR($codeCR);
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
	    die();
        }
      
    }
?>