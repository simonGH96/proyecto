<?php
    class AreaThoughts extends Controllers{

        public function __construct(){
            parent::__construct();
        }

        public function AreaThoughts(string $page){
            $page = intval(strClean($page));
            $data['page_tag'] = 'Pensamientos por Área';
            $data['page_title'] = 'Pensamientos por Área';
            $data['page_functions_js'] = "functions_area_thoughts.js";
            $this->views->getView($this,"AreaThoughts",$data);
        }


        public function getSubjectByIdThinking(int $codeTR){
            $arrData = $this->model->searchAllSubjectByThinking($codeTR);
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
	    die();
        }
        
    }
?>