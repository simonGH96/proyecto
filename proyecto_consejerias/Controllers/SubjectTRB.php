<?php
    class SubjectTRB extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function SubjectTRB(int $codeTR){
            // echo ''.$codeCR.' '.$this->getCRTitleById($codeTR);
            // $data = $this->model->searchCRTitleById($codeTR);
            // echo $data;
            // $data = $this->searchAllSubject();

            $data['page_tag'] = $this->getCRTitleById($codeTR);
            $data['page_title'] = $this->getCRTitleById($codeTR);
            $data['page_functions_js'] = "functions_thinking_tr.js";
            $this->views->getView($this,"SubjectTRB",$data);
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

	public function getCRTitleById(int $codeTR){
            // echo "HOLAS El codigo que viene es es".$codeTR;
            $data = $this->model->searchCRTitleById($codeTR);
            // echo $data;
            // echo "NO SE QUE PASA ".$data1;
            // echo " LA DATA = ". $data['nombre'];
            return $data['nombre'];
        }
    }
?>