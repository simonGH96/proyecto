<?php
    class SubjectTR extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function SubjectTR(int $codeTR){
            $data['page_tag'] = $this->getTRTitleById($codeTR);
            $data['page_title'] = $this->getTRTitleById($codeTR);
            $data['page_functions_js'] = "functions_subjects_tr.js";
            $this->views->getView($this,"SubjectTR",$data);
        }

        public function getSubject(){
            $htmlOptions = "";
            $arrData = $this->model->searchAllSubject();
            if(count($arrData) > 0){
                for($i = 0; $i <count($arrData); $i++){
                    $htmlOptions .= '<option value="'.$arrData[$i]['codigo'].'">'.$arrData[$i]['nombre'].'</option>';
                }
            }
            echo $htmlOptions;
            die();
        }

	public function getTRTitleById(int $codeTR){
            $data = $this->model->searchTRTitleById($codeTR);
            // echo $data['descripcion'];
            return $data['descripcion'];
        }

        public function getSubjectById(int $codeTR){
            $arrData = $this->model->searchAllSubjectByTR($codeTR);
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
	    die();
        }
    }
?>