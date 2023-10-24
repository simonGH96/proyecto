<?php
    class SubjectCR extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function SubjectCR(int $codeCR){
            // echo ''.$codeCR.' '.$this->getCRTitleById($codeCR);
            // $data = $this->model->searchCRTitleById($codeCR);
            // echo $data;

            $data['page_tag'] = $this->getCRTitleById($codeCR);
            $data['page_title'] = $this->getCRTitleById($codeCR);
            $data['page_functions_js'] = "functions_subjects_cr.js";
            $this->views->getView($this,"SubjectCR",$data);
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

	public function getCRTitleById(int $codeCR){
            // echo "HOLAS El codigo que viene es es".$codeCR;
            $data = $this->model->searchCRTitleById($codeCR);
            // echo $data;
            // echo "NO SE QUE PASA ".$data1;
            // echo " LA DATA = ". $data['nombre'];
            return $data['nombre'];
        }

        public function getSubjectByIdConceptual(int $codeCR){
            // echo "HOLIS<>";
            $arrData = $this->model->searchAllSubjectByCR($codeCR);
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
	    die();
        }
    }
?>