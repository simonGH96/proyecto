<?php
    class ConceptualResult extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function ConceptualResult(string $page){
            $page = intval(strClean($page));
            $data['page_tag'] = 'Herramientas Conceptuales';
            $data['page_title'] = 'Herramientas Conceptuales';
            $data['pagination'] = ceil($this->getConceptualResultAmount()/12);
            $data['page_functions_js'] = "functions_conceptual_result.js";
            $this->views->getView($this,"ConceptualResult",$data);
            // $this->views->getView($this,"SubjectConceptual",$data);
        }

        public function SearchBarConceptual($page){
            $words = "";
            if(isset($_POST['query'])){
                $words = strClean($_POST['query']);
            }
            $arrData = "";
            if (empty($words)){
                $arrData = $this->getConceptualResult();
            } else {
                $arrData = $this->model->searchBarConceptualQuery($words);
		$this->printHtmlCode($arrData);
            }
        }

        public function getConceptualResultAmount(){
            $data = $this->model->searchConceptualResultAmount();
            return $data[0]['amount'];
        }

        public function getConceptualResult(){
            $offset = 0;
            if(isset($_POST['pageNumber'])){
                $offset = intval(strClean($_POST['pageNumber']));
            }
            $offset = $offset * 12;
            $arrData = $this->model->searchAllConceptualResult($offset);
            $this->printHtmlCode($arrData);
        }

        public function getConceptualResultSelect(){
            $htmlOptions = "";
            $arrData = $this->model->searchAllConceptualResultSelect();
            if(count($arrData) > 0){
                for($i = 0; $i <count($arrData); $i++){
                    $htmlOptions .= '<option value="'.$arrData[$i]['codigo'].'">'.$arrData[$i]['detalle'].'</option>';
                }
            }
            echo $htmlOptions;
            die();
        }

        public function getConceptualResultById(int $id){
            $id = intval(strClean($id));
            if($id > 0){
                $arrData = $this->model->searchConceptualResultById($id);
		        $arrData['detalle'] = nl2br($arrData['detalle']);
                $this->getByIdCRMessage($arrData);
            }
            die();
        }

        private function getLastCode(){
            $data = $this->model->searchLastCodeConceptual();
            return $data[0]['code'];
        }

        private function getByIdCRMessage($arrData){
            $arrResponse = "";
            if (empty($arrData)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            } else {
                $arrResponse = array('status' => true, 'msg' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            return $arrResponse;
        }

        private function printHtmlCode($arrData){
            $response = "";
            if(count($arrData) > 0){
                foreach($arrData as $key=>$value):
                    $response.='<div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">'.$value['nombre'].'</h5>
                                            <div class="card-initial-page">
                                            <div>'
                                                .$value['detalle'].'
                                            </div>
                                            <button type="button" class="btn btn-link" onclick="viewMore(this)" cr="'.$value['codigo'].'"></button>
                                        </div>
                                    <div class="text-center" id="view-subjects">
                                    <a href="'. baseUrl().'SubjectCR/SubjectCR/'.$value['codigo'].'" class="btn bd-yellow-300">Espacios académicos</a>
                                </div>
                        </div>
                    </div>
                </div>';
                endforeach;
            } else {
                $response.='No se encontrados resulados que coincidan con su b&uacutesqueda';
            }
            echo $response;
        }
    }
?>