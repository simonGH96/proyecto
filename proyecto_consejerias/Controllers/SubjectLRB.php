<?php
    class SubjectLRB extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function SubjectLRB(int $codeCR){
            // echo ''.$codeCR.' '.$this->getCRTitleById($codeCR);
            // $data = $this->model->searchCRTitleById($codeCR);
            // echo $data;
            // $data = $this->searchAllSubject();

            $data['page_tag'] = $this->getCRTitleById($codeCR);
            $data['page_title'] = $this->getCRTitleById($codeCR);
            $data['page_functions_js'] = "functions_learning_lr.js";
            $this->views->getView($this,"SubjectLRB",$data);
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
    }
?>