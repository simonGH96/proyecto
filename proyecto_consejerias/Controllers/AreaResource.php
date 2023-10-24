<?php
    class AreaResource extends Controllers{

        public function __construct(){
            parent::__construct();
        }

        public function AreaResource(string $page){
            $page = intval(strClean($page));
            $data['page_tag'] = 'Recursos por Área';
            $data['page_title'] = 'Recursos por Área';
            $data['page_functions_js'] = "functions_area_resource.js";
            $this->views->getView($this,"AreaResource",$data);
        }

        public function getSubjectByIdResource(int $codeRR){
            $arrData = $this->model->searchAllSubjectByRR($codeRR);
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
	    die();
        }
    }
?>