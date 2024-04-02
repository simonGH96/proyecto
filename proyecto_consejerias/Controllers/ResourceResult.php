<?php
    class ResourceResult extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function ResourceResult(string $page){
            $page = intval(strClean($page));
            $data['page_tag'] = 'Recursos';
            $data['page_title'] = 'Recursos';
            $data['pagination'] = ceil($this->getResourceResultAmount()/12);
            $data['page_functions_js'] = "functions_resource_result.js";
            $this->views->getView($this,"ResourceResult",$data);
            // $this->views->getView($this,"SubjectConceptual",$data);
        }

        public function SearchBarResource($page){
            $words = "";
            if(isset($_POST['query'])){
                $words = strClean($_POST['query']);
            }
            $arrData = "";
            if (empty($words)){
                $arrData = $this->getResourceResult();
            } else {
                $arrData = $this->model->searchBarResourceQuery($words);
		$this->printHtmlCode($arrData);
            }
        }

        public function getResourceResultAmount(){
            $data = $this->model->searchResourceResultAmount();
            return $data[0]['amount'];
        }

        public function getResourceResult(){
            $offset = 0;
            if(isset($_POST['pageNumber'])){
                $offset = intval(strClean($_POST['pageNumber']));
            }
            $offset = $offset * 12;
            $arrData = $this->model->searchAllResourceResult($offset);
            $this->printHtmlCode($arrData);
        }

        public function getResourceResultSelect(){
            $htmlOptions = "";
            $arrData = $this->model->searchAllResourceResultSelect();
            if(count($arrData) > 0){
                for($i = 0; $i <count($arrData); $i++){
                    $htmlOptions .= '<option value="'.$arrData[$i]['codigo'].'">'.$arrData[$i]['detalle'].'</option>';
                }
            }
            echo $htmlOptions;
            die();
        }

        public function getResourceResultById(int $id){
            $id = intval(strClean($id));
            if($id > 0){
                $arrData = $this->model->searchResourceResultById($id);
		$arrData['detalle'] = nl2br($arrData['detalle']);
                $this->getByIdRRMessage($arrData);
            }
            die();
        }

        private function getLastCode(){
            $data = $this->model->searchLastCodeResource();
            return $data[0]['code'];
        }

        private function getByIdRRMessage($arrData){
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
                                            <button type="button" class="btn btn-link" onclick="viewMore(this)" rr="'.$value['codigo'].'"></button>
                                        </div>
                                    <div class="text-center" id="view-subjects">
                                    <a href="'. baseUrl().'SubjectRR/SubjectRR/'.$value['codigo'].'" class="btn bd-yellow-300">Espacios académicos</a>
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