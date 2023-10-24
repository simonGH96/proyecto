<?php
    class ObjectResult extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function ObjectResult(string $page){
            $page = intval(strClean($page));
            $data['page_tag'] = 'Objetos de Estudio';
            $data['page_title'] = 'Objetos de Estudio';
            $data['pagination'] = ceil($this->getObjectResultAmount()/12);
            $data['page_functions_js'] = "functions_object_result.js";
            $this->views->getView($this,"ObjectResult",$data);
            // $this->views->getView($this,"SubjectObject",$data);
        }

        public function SearchBarObject($page){
            $words = "";
            if(isset($_POST['query'])){
                $words = strClean($_POST['query']);
            }
            $arrData = "";
            if (empty($words)){
                $arrData = $this->getObjectResult();
            } else {
                $arrData = $this->model->searchBarObjectQuery($words);
		$this->printHtmlCode($arrData);
            }
        }

        public function getObjectResultAmount(){
            $data = $this->model->searchObjectResultAmount();
            return $data[0]['amount'];
        }

        public function getObjectResult(){
            $offset = 0;
            if(isset($_POST['pageNumber'])){
                $offset = intval(strClean($_POST['pageNumber']));
            }
            $offset = $offset * 12;
            $arrData = $this->model->searchAllObjectResult($offset);
            $this->printHtmlCode($arrData);
        }

        public function getObjectResultSelect(){
            $htmlOptions = "";
            $arrData = $this->model->searchAllObjectResultSelect();
            if(count($arrData) > 0){
                for($i = 0; $i <count($arrData); $i++){
                    $htmlOptions .= '<option value="'.$arrData[$i]['codigo'].'">'.$arrData[$i]['detalle'].'</option>';
                }
            }
            echo $htmlOptions;
            die();
        }

        public function getObjectResultById(int $id){
            $id = intval(strClean($id));
            if($id > 0){
                $arrData = $this->model->searchObjectResultById($id);
		$arrData['detalle'] = nl2br($arrData['detalle']);
                $this->getByIdORMessage($arrData);
            }
            die();
        }

        private function getLastCode(){
            $data = $this->model->searchLastCodeObject();
            return $data[0]['code'];
        }

        private function getByIdORMessage($arrData){
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
                                            <h5 class="card-title">'.$value['descripcion'].'</h5>
                                            <div class="card-initial-page">
                                            <div>'
                                                .$value['detalle'].'
                                            </div>
                                            <button type="button" class="btn btn-link" onclick="viewMore(this)" or="'.$value['codigo'].'"></button>
                                        </div>
                                    <div class="text-center" id="view-subjects">
                                    <a href="'. baseUrl().'SubjectOR/SubjectOR/'.$value['codigo'].'" class="btn bd-yellow-300">Espacios académicos</a>
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