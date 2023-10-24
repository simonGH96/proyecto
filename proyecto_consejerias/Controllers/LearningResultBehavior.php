<?php
    class LearningResultBehavior extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function LearningResultBehavior(int $codeLRB){
            $data['page_tag'] = $this->getLRBTitleById($codeLRB);
            $data['page_title'] = $this->getLRBTitleById($codeLRB);
            $data['page_functions_js'] = "functions_subjects_lrb.js";
            $this->views->getView($this,"LearningResultBehavior");
        }

        public function getLearning(){
            $htmlOptions = "";
            $arrData = $this->model->searchAllLearning();
            if(count($arrData) > 0){
                for($i = 0; $i <count($arrData); $i++){
                    $htmlOptions .= '<option value="'.$arrData[$i]['codigo'].'">'.$arrData[$i]['nombre'].'</option>';
                }
            }
            echo $htmlOptions;
            die();
        }

	public function getLRTitleById(int $codeLR){
            $data = $this->model->searchLRBTitleById($codeLR);
            return $data['descripcion'];
        }

        public function getSubjectById(int $codeLR){
            $arrData = $this->model->searchAllSubjectByLR($codeLR);
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
	    die();
        }
    }
?>