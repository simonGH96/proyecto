<?php
    class SubjectORB extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function SubjectORB(int $codeOR){
            // echo ''.$codeCR.' '.$this->getCRTitleById($codeOR);
            // $data = $this->model->searchCRTitleById($codeOR);
            // echo $data;
            // $data = $this->searchAllSubject();

            $data['page_tag'] = $this->getCRTitleById($codeOR);
            $data['page_title'] = $this->getCRTitleById($codeOR);
            $data['page_functions_js'] = "functions_object_or.js";
            $this->views->getView($this,"SubjectORB",$data);
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

	public function getCRTitleById(int $codeOR){
            // echo "HOLAS El codigo que viene es es".$codeOR;
            $data = $this->model->searchCRTitleById($codeOR);
            // echo $data;
            // echo "NO SE QUE PASA ".$data1;
            // echo " LA DATA = ". $data['nombre'];
            return $data['nombre'];
        }
    }
?>