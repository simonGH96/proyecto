<?php
    class SubjectRR extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function SubjectRR(int $codeRR){
            $data['page_tag'] = $this->getRRTitleById($codeRR);
            $data['page_title'] = $this->getRRTitleById($codeRR);
            $data['page_functions_js'] = "functions_subjects_rr.js";
            $this->views->getView($this,"SubjectRR",$data);
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

	public function getRRTitleById(int $codeRR){
            $data = $this->model->searchRRTitleById($codeRR);
            // echo $data['descripcion'];
            return $data['descripcion'];
        }

        public function getSubjectById(int $codeRR){
            $arrData = $this->model->searchAllSubjectByRR($codeRR);
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
	    die();
        }
    }
?>