<?php
    class SubjectRRB extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function SubjectRRB(int $codeRR){
            // echo ''.$codeCR.' '.$this->getCRTitleById($codeRR);
            // $data = $this->model->searchCRTitleById($codeRR);
            // echo $data;
            // $data = $this->searchAllSubject();

            $data['page_tag'] = $this->getCRTitleById($codeRR);
            $data['page_title'] = $this->getCRTitleById($codeRR);
            $data['page_functions_js'] = "functions_resource_rr.js";
            $this->views->getView($this,"SubjectRRB",$data);
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

	public function getCRTitleById(int $codeRR){
            // echo "HOLAS El codigo que viene es es".$codeRR;
            $data = $this->model->searchCRTitleById($codeRR);
            // echo $data;
            // echo "NO SE QUE PASA ".$data1;
            // echo " LA DATA = ". $data['nombre'];
            return $data['nombre'];
        }
    }
?>