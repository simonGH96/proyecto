<?php
    class AreaStudyObject extends Controllers{

        public function __construct(){
            parent::__construct();
        }

        public function AreaStudyObject(string $page){
            $page = intval(strClean($page));
            $data['page_tag'] = 'Objetos de Estudio por Área';
            $data['page_title'] = 'Objetos de Estudio por Área';
            $data['page_functions_js'] = "functions_area_study_object.js";
            $this->views->getView($this,"AreaStudyObject",$data);
        }

        public function getSubjectByIdObject(int $codeOR){
            $arrData = $this->model->searchAllSubjectByOR($codeOR);
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
	    die();
        }
    }
?>