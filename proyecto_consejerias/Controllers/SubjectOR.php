<?php
    class SubjectOR extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function SubjectOR(int $codeOR){
            $data['page_tag'] = $this->getORTitleById($codeOR);
            $data['page_title'] = $this->getORTitleById($codeOR);
            $data['page_functions_js'] = "functions_subjects_or.js";
            $this->views->getView($this,"SubjectOR",$data);
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

	public function getORTitleById(int $codeOR){
            $data = $this->model->searchORTitleById($codeOR);
            // echo $data['descripcion'];
            return $data['descripcion'];
        }

        public function getSubjectById(int $codeOR){
            $arrData = $this->model->searchAllSubjectByOR($codeOR);
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
	    die();
        }
    }
?>